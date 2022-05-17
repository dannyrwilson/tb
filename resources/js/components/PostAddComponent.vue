<template>
    <form @submit.prevent="onSubmit">
        <div class="form-group">
            <label for="title">
                Title
            </label>
            <input type="" name="title" v-model="title" id="title" class="form-control">
        </div>
        <div class="form-group mt-2">
            <label for="content">
                Content
            </label>
            <textarea class="form-control" v-model="content" id="content" name="content"></textarea>
        </div>
        <div class="mt-3 text-end">
            <button class="btn btn-primary" type="submit">Add Post</button>
        </div>
    </form>
</template>

<script>
    export default {
        data() {
            return {
                title: '',
                content: ''
            }
        },
        mounted() {
            console.log('PostAddComponent Component mounted.')
        },
        methods: {
            onSubmit() {

                let post = {
                    title: this.title,
                    content: this.content,
                    post_type: 'post'
                }

                axios.post('/media', post).then(function(response){
                    console.log('post submit result', response)
                })
                    

                // empty
                this.title = '';
                this.content = '';

                this.$root.$emit('WallListComponent')

            }
        }
    }
</script>
