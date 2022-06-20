<template>
<div>
    <h1 class="text-center pt-5 pb-5">USUARIOS</h1>

    <table class="table pt-5">
        <thead>
            <tr>
                <td>ID</td>
                <td>NOMBRE</td>
                <td>EMAIL</td>
                <td>ACCIONES</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            <tr v-for="comment in comments.data" :key="comment.id">
                <td>{{ comment.id}}</td>
                <td>{{ comment.name }}</td>
                <td>{{ comment.email}}</td>
                <td>
                    <router-link class="btn btn-info btn-sm" :to="{ name: 'comments.edit', params:{id:comment.id}}">Edit</router-link>
                    <button @click="delete_comment(comment.id)" class="btn btn-danger btn-sm">Delete</button>
                </td>
            </tr>
        </tbody>
    </table>

    <!-- <pagination :data="comments" @pagination-change-page="getResults"></pagination> -->
</div>
</template>
<script>
import axios from 'axios'


export default{
    data(){
        return{
            comments: {}
        }
    },
    mounted(){
        this.getResults();
        // axios.get('/api/comments').then(response => {
        //     this.comments = response.data.data;
        // });
    },
    methods: {
        getResults(page = 1){
            axios.get('/api/comments?page=' + page)
            .then(response => {
                this.comments= response.data;
            })
        },
        delete_comment(comment_id){
            axios.delete('/api/comments/' + comment_id)
            .then(response =>{
                this.getResults();
            });
        }
    },
}

</script>
