<template>

    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h4>edit Items</h4>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="">name</label>
                    <input type="text" v-model="model.items.name" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">price</label>
                    <input type="text" v-model="model.items.price" class="form-control" />
                </div>
                <div class="mb-3">
                    <button type="button" @click="saveItems" class="btn btn-primary">save</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
export default {
    name: 'itemEdit',
    data(){
        return{
            model: {
                items: {
                    name: '',
                    price:''
                }
            }
        }
    },
    mounted(){

        console.log(this.$route.params.id)
        this.getItemsData(this.$route.params.id);
    },
    methods: {

        getItemsData(itemid){
            axios.get(`http://localhost:8000/api/items/${itemid}/edit`).then(res =>
            {
                console.log(res)
            })
        },

        saveItems(){

            axios.post('http://localhost:8000/api/items', this.model.items)
            .then(res=> {
                console.log(res)
                alert(res.data.message);
            })
        }
    },
}

</script>