
import { onMounted } from 'vue';

import { RouterLink } from 'vue-router';
<template>
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
                    <tr>

                    </tr>
                </tbody>
            </table>
        </div>
   </div>
</template>

<script>
export default {
    name: 'items',
    data(){
        return {
            items: []
        }
    },
    mounted(){
        console.log('i am here')
    }
}
</script>