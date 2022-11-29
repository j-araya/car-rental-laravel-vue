<template>
    <ul>
        <li v-for="car in cars" :key="car.id">
            <h1>{{car.brand}}</h1>
            <h1>{{car.model}}</h1>
            <h1>{{car.plate}}</h1>
            <h1>{{car.color}}</h1>
            <h1>{{car.state}}</h1>
            <button @click="updateCar(car)">Editar</button>
            <button @click="deleteCar(car)">Eliminar</button>
            <hr>
        </li>
        
    </ul>
</template>

<script>
    import axios from 'axios';

    export default {
        data(){
            return {
                cars: []
            }
        },

        created() {
            this.refresh()
        },

        methods: {
            refresh(){
                axios.get('/car').then(res=>{
                        this.cars = res.data
                    }
                )
                .catch((err) => {
                    console.log(err)
                })
            },
            updateCar(car){
                window.location.href = `/car/${car.id}/edit`
            },
            deleteCar(car){
                if (confirm(`Estas seguro que quieres eliminar ${car.brand} - ${car.model}?`)) {
                    axios.delete(`/car/${car.id}`)
                    .then(()=>{
                        this.refresh()
                    })
                    .catch((err) => {
                        console.log(err)
                    })
                }
            }
        },
    }
</script>