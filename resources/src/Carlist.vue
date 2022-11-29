<template>
    <ul>
        <li v-for="(car, index) in cars">
            <h1>{{car.brand}}</h1>
            <h1>{{car.model}}</h1>
            <h1>{{car.plate}}</h1>
            <h1>{{car.color}}</h1>
            <h1>{{car.state}}</h1>
            <button>Eliminar</button>
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
            axios.get('/car').then(res=>{
                    this.cars = res.data
                }
            )
        },

        methods: {
            delete(){
                
            }
        },
    }
</script>