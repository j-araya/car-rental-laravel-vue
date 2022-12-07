<template>
    <div class="container-fluid py-5 d-flex justify-content-center">
        <div id="c-table" class="border rounded p-5">
            <h2>Lista de Carros</h2>
            <table class="table table-light table-striped border border-2" id="list">
                <thead>
                    <tr>
                        <!-- <th scope="col">ID</th> -->
                        <th scope="col">Marca</th>
                        <th scope="col">Modelo</th>
                        <th scope="col">Placa</th>
                        <th scope="col">Estado</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="car in cars" :key="car.id">
                        <!-- 
                            <th scope="row">{{car.id}}</th> -->
                            <td class="text-3xl font-bold underline">{{car.brand}}</td>
                            <td>{{car.model}}</td>
                            <td>{{car.plate}}</td>
                            <td>{{states[car.state]}}</td>
                            <td>
                                <button @click="updateCar(car)">Editar</button>
                            </td>
                            <td>
                                <button @click="deleteCar(car)">Eliminar</button>
                            </td>
                        </tr>
                </tbody>
                
            </table>
            <div class="d-flex justify-content-center">
                <button class="py-2 px-4 m-4" @click="pdf()">
                    PDF
                </button>
                <a href="/car/create">
                    <button class="py-2 px-4 m-4" >Agregar</button>
                </a>
            </div>
        </div>

    </div>

</template>

<style>

    #c-table{
        max-width: 1000px;
        background-color: #dbdada;
    }

</style>

<script>
    import axios from 'axios';
    import html2pdf from 'html2pdf.js';

    export default {
        data(){
            return {
                cars: [],
                states: {
                    'active': 'Activo',
                    'inactive': 'Inactivo',
                    'rented': 'Rentado',
                }
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
            },
            pdf(){
                var element = document.getElementById('list')
                html2pdf(element)
            },
        },
    }
</script>