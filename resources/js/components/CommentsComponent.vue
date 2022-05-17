<template>
    <div>
        <div class="card-footer">
        <h5>Comments (<span>{{ post.comments.length }}</span>)</h5>
            <div class="ui-comments">
                <ul class="comment-list">
                    <li v-for="comment in post.comments">
                        <div class="card">
                            <div class="card-body">
                                <p><strong>{{ comment.user !== null ? comment.user.name : 'Anonymous' }}</strong> &quot;{{ comment.comment}}&quot;</p>
                                <p class="mb-0"><small>{{ comment.time_ago }}</small></p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>


        <div class="p-4 bg-white">
            <h5>Add Comment</h5>
            <form @submit.prevent="onCommentSubmit(post.id)">
                <div class="form-group">
                    <textarea class="form-control" v-model="comment" id="content" placeholder="Enter your comment to reply to this post..."></textarea>
                </div>
                <div class="form-group mt-2">
                    <button class="btn btn-info" type="submit">Add Comment</button>
                </div>
            </form>

        </div>
    </div>
</template>

<script>
    export default {
        props: {
            post: Object
        },
        data() {
            return {
                comment: ''
            }
        },
        mounted() {
            console.log('CommentsComponent Component mounted.')
        },
        methods: {
            onCommentSubmit(media_id) {

                // build comment object
                let comment = {
                    media_id: media_id,
                    comment: this.comment
                }

                // perform request to add comment
                axios.post('/comment', comment).then(function(response){
                    console.log('comment submit result', response)
                });

                // empty
                this.comment = '';

                // reinit wall
                this.$root.$emit('WallListComponent');

            }
        }
    }
</script>
