<template>
    <div class="container-fluid d-flex justify-content-center py-5">
        <form class="border rounded  py-4" @submit.prevent="save" enctype="multipart/form-data">
            <h2 class="text-center mb-3">Registrar nuevo carro</h2>
            <div class="form-group px-5">
                <label for="brand">Marca: </label>
                <input class="form-control" type="text" name="brand" id="brand" v-model="car.brand" required>
                <br>

            </div>
            <div class="form-group px-5">
                <label for="model">Modelo: </label>
                <input class="form-control" type="text" name="" id="model" v-model="car.model" required>
                <br>

            </div>
            <div class="form-group px-5">
                <label for="plate">Placa: </label>
                <input class="form-control" type="text" name="" id="plate" v-model="car.plate" required>
                <br>

            </div>
            <div class="form-group px-5">
                <label for="color">Color: </label>
                <input class="form-control" type="text" name="" id="color" v-model="car.color" required>
                <br>

            </div>
            <div class="form-group px-5">
                <label for="cartype">Tipo de vehiculo</label>
                <select class="form-control" name="" id="cartype" v-model="car.cartype_id" required>
                    <option v-for="cartype in cartypes" :key="cartype.id" :value="cartype.id">
                        {{cartype.type}}
                    </option>
                </select>
                <br>


            </div>
            <div class="form-group px-5">
                <label for="state">Estado del vehiculo: </label>
                <select class="form-control" name="" id="state" v-model="car.state" required>
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

            </div>
            <div class="form-group px-5">
                <label for="photo1">Foto 1: </label>
                <input class="form-control-file" type="file" name="" id="photo1" @change="onChange($event, 1)" required>
                <figure>
                    <img width="200"  :src="image1" alt="">
                </figure>
                <br>

            </div>
            <div class="form-group px-5">
                <label for="photo2">Foto 2: </label>
                <input class="form-control-file" type="file" name="" id="photo2" @change="onChange($event, 2)" required>
                <figure>
                    <img width="200"  :src="image2" alt="">
                </figure>
                <br>

            </div>
            <div class="form-group px-5">
                <label for="photo3">Foto 3: </label>
                <input class="form-control-file" type="file" name="" id="photo3" @change="onChange($event, 3)" required>
                <figure>
                    <img width="200"  :src="image3" alt="">
                </figure>
                <br>

            </div>
            <div class="form-group px-5">
                <label for="photo4">Foto 4: </label>
                <input class="form-control-file" type="file" name="" id="photo4" @change="onChange($event, 4)" required>
                <figure>
                    <img width="200"  :src="image4" alt="">
                </figure>
                <br>

            </div>
            <div class="form-group px-5 d-flex justify-content-end">

                <input class="py-2 px-4 m-4" type="submit" value="Guardar">
            </div>
        </form>

    </div>
</template>

<style>

form{
    background-color: #f2f1f1;
    max-width: 500px;
}

</style>

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
                    photo1: {},
                    photo2: {},
                    photo3: {},
                    photo4: {},
                },
                cartypes: [],
                editing : false,
                id: null,
                loadedImages: [
                    null,
                    null,
                    null,
                    null,
                    null,
                ]
                
            }
        },
        created(){
            // Get cartypes for the selection field 
            axios.get('/cartype').then(res =>{
                    this.cartypes = res.data
                }
            )

            // Check if is update or create 
            var segments = window.location.pathname.split('/')
            if (segments.length == 4) {
                // Is Update form
                this.editing = true
                this.id = segments[2]
                axios.get(`/car/${segments[2]}`)
                .then((res)=>{
                    this.car = res.data
                })
                .catch((err)=>{
                    console.log(err)
                })
                
            } 
        },
        methods: {
            save(){
                if (this.editing) {
                    this.update()
                } else {
                    this.create()
                }
            },
            create(){
                console.log(this.car)
                const config = {
                    headers: {
                        'content-type': 'multipart/form-data'
                    }
                }
                var form = new FormData()
                form.append('brand', this.car.brand)
                form.append('model', this.car.model)
                form.append('plate', this.car.plate)
                form.append('color', this.car.color)
                form.append('state', this.car.state)
                form.append('cartype_id', this.car.cartype_id)
                form.append('photo1', this.car.photo1)
                form.append('photo2', this.car.photo2)
                form.append('photo3', this.car.photo3)
                form.append('photo4', this.car.photo4)

                axios.post('/car', form).then((res)=>{
                    window.location.href = '/car'
                })
                .catch((err) => {
                    console.log(err)
                })
            },
            update(){
                console.log(this.car)
                axios.put(`/car/${this.id}`, this.car).then((res)=>{
                    window.location.href = '/car'
                })
                .catch((err) => {
                    console.log(err)
                })
            },
            onChange(e, i){
                console.log("onChange")
                switch (i) {
                    case 1:
                        console.log('case1')
                        this.car.photo1 = e.target.files[0]
                        break;
                    case 2:
                        console.log('case2')
                        this.car.photo2 = e.target.files[0]
                        break;
                    case 3:
                        console.log('case3')
                        this.car.photo3 = e.target.files[0]
                        break;
                    case 4:
                        console.log('case4')
                        this.car.photo4 = e.target.files[0]
                        break;
                    }
                this.loadimage(e.target.files[0], i)

            },loadimage(file, i){
                let reader = new FileReader();

                reader.onload = (e) => {
                    this.loadedImages[i] = e.target.result
                }
                reader.readAsDataURL(file)
            }

        },
        computed:{
            image1(){
                return this.loadedImages[1]
            },
            image2(){
                return this.loadedImages[2]
            },
            image3(){
                return this.loadedImages[3]
            },
            image4(){
                return this.loadedImages[4]
            },

        }

    }
</script>