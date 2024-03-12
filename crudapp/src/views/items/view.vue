
import { onMounted } from 'vue';

import { RouterLink } from 'vue-router';
<template>
    <div class="container">
   <div class = "card">
    <div class="card-header">
        <h4>
            items
            <RouterLink to="/items/create" class="btn btn-primary float-end">
                add item
            </RouterLink>
        </h4>
    </div>
        <div class="card-body">
            <table class="table table-border">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(items) in this.items" :key="index">
                        <td>{{ items.id }}</td>
                        <td>{{ items.name }}</td>
                        <td>{{ items.price }}</td>
                        <td>
                            <RouterLink :to="{ path: '/items'+items.id+'/edit'}" class="btn btn-succes mx-2">
                                edit
                            </RouterLink>
                            <button type="button" @click="deleteItems(items.id)" class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
   </div>
</div>
</template>

<script>
import axios from 'axios'
export default {
    name: 'items',
    data(){
        return {
            items: []
        }
    },
    mounted(){

        this.getItems();
        //console.log('i am here')
    },
    methods: {
        getItems(){

            axios.get('http://localhost:8000/api/items').then(res =>{
                this.items = res.data.items
                console.log(this.items)
            });
        },

        deleteItems(itemid){

            if(confirm('Are you sure, you want to delete this item?'))
            // console.log(itemid)
            axios.delete(`http://localhost:8000/api/items/${itemid}/delete`)
            .then(res => {
                alert(res.data.message);
            });

        }

    }
}
</script>