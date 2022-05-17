<template>
    <div>
        <ul class="post-list">
            <li v-for="post in media" class="mb-5">
                <div class="card b-0 shadow">
                    <div class="card-header">
                        <h5 class="p-0 m-0">{{ post.title }}</h5>
                    </div>
                    <div class="card-body">
                        <p class="text-small text-end"><i>Posted {{ post.time_ago }}</i> by {{ post.user !== null ? post.user.name : 'Anonymous' }}</p>
                        <span v-if="post.post_type == 'post'" style="white-space: pre-wrap;">{{ post.content }}</span>
                        <div v-if="post.post_type == 'video'">
                            <iframe id="ytplayer" type="text/html" width="100%" height="360" v-bind:src="post.content" frameborder="0"></iframe>
                        </div>
                    </div>
                
                    <comments-component :post="post"></comments-component>
                    
                </div>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                media: {

                }
            }
        },
        methods: {
            refreshWall(page = 1) {
                axios.get('/media?page='+page).then(response => {
                    this.media = response.data;
                });
            }
        },
        mounted() {
            
            this.refreshWall();

            this.$root.$on('WallListComponent', () => {
                this.refreshWall()
            })
        }
    }
</script>
