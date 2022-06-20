<template>
    <div>
        <h1 class="text-center mt-5">EDITAR USUARIO</h1>
        <div>
            <form @submit.prevent="submit_form">
                <div class="form-group pb-3" >
                    <label for="pb-5">Nombre</label>
                    <input class="form-control" type="text" v-model='fields.name'>
                    <div class="alert alert-danger" v-if="errors && errors.name">
                         {{ errors.name[0] }}
                    </div>
                </div>
                <div class="form-group pb-3">
                    <label for="pb-5">Email</label>
                    <input class="form-control" type="email" v-model='fields.email'>
                    <div class="alert alert-danger" v-if="errors && errors.email">
                         {{ errors.email[0] }}
                    </div>
                </div>

                <input type="submit" class="btn btn-primary" :disabled="form_submitting"
                :value="form_submitting ? 'Editando Usuario ...' : 'Editar'">
            </form>
        </div>
    </div>
</template>
<script>
    export default{
        data() {
            return {
                fields: {
                    'name': '',
                    'email': '',
                },
                errors:{},
                form_submitting:false
            }
        },
        mounted() {
            axios.get('/api/comments/' + this.$route.params.id)
                .then(response => {
                    this.fields = response.data.data;
                });
        },
        methods: {
            submit_form() {
                this.form_submitting = true;
                axios.put('/api/comments/' + this.$route.params.id, this.fields)
                    .then(response => {
                        this.$router.push('/');
                        this.form_submitting = false;
                    }).catch( error => {
                        if (error.response.status === 422) {
                            this.errors = error.response.data.errors;
                        }
                        this.form_submitting = false;
                    });
            }
        }
    }

</script>

