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
                Youtube Link
            </label>
            <input class="form-control" v-model="content" id="content" name="content">
        </div>
        <div class="mt-3 text-end">
            <button class="btn btn-primary" type="submit">Add Video</button>
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
            console.log('VideoAddComponent Component mounted.')
        },
        methods: {
            onSubmit() {

                let video = {
                    title: this.title,
                    content: this.content,
                    post_type: 'video'
                }

                axios.post('/media', video).then(function(response){
                    console.log('video submit result', response)
                })
                    

                // empty
                this.title = '';
                this.content = '';

                // reinit wall
                this.$root.$emit('WallListComponent')

            }
        }
    }
</script>
