<template>
    
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
            increment() {
                
            }
        },
    }
</script>