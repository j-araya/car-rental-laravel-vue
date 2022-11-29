<template>
    <form @submit.prevent="create">
        <label for="brand">Marca: </label>
        <input type="text" name="" id="brand" v-model="car.brand">
        <br>
        <label for="model">Modelo: </label>
        <input type="text" name="" id="model" v-model="car.model">
        <br>
        <label for="plate">Placa: </label>
        <input type="text" name="" id="plate" v-model="car.plate">
        <br>
        <label for="color">Color: </label>
        <input type="text" name="" id="color" v-model="car.color">
        <br>
        <label for="cartype">Tipo de vehiculo</label>
        <select name="" id="cartype" v-model="car.cartype_id">
            <option v-for="cartype in cartypes" :key="cartype.id" :value="cartype.id">
                {{cartype.type}}
            </option>
        </select>
        <br>
        <label for="state">Estado del vehiculo: </label>
        <select name="" id="state" v-model="car.state">
            <option value="active">
                Activo
            </option>
            <option value="inactive">
                Desactivado
            </option>
            <option value="rented">
                Rentado
            </option>
        </select>
        <br>
        <label for="photo1">Foto1: </label>
        <input type="text" name="" id="photo1" v-model="car.photo1">
        <br>
        <label for="photo1">Foto2: </label>
        <input type="text" name="" id="photo2" v-model="car.photo2">
        <br>
        <label for="photo1">Foto3: </label>
        <input type="text" name="" id="photo3" v-model="car.photo3">
        <br>
        <label for="photo1">Foto4: </label>
        <input type="text" name="" id="photo4" v-model="car.photo4">
        <br>
        <input type="submit" value="Crear">
    </form>
</template>

<script>
import axios from 'axios'

    export default {
        data(){
            return {
                car: {
                    brand: null,
                    model: null,
                    plate: null,
                    color: null,
                    cartype_id: null,
                    state: null,
                    photo1: null,
                    photo2: null,
                    photo3: null,
                    photo4: null,
                },
                cartypes: []
            }
        },
        created(){
            axios.get('/cartype').then(res =>{
                    this.cartypes = res.data
                }
            )
        },
        methods: {
            create(){
                console.log(this.car)
                axios.post('/car', this.car).then((res)=>{
                    window.location.href = '/car'
                })
            }
        }
    }
</script>