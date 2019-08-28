<template>
    <div>
        <button
            @click="followUser"
            v-text="buttonText"
            v-bind:class="{'btn-secondary': status}"
            class="btn btn-primary btn-sm ml-3">
        </button>
    </div>
</template>

<script>
    export default {
        props: ['userId', 'follows'],
        mounted() {

        },

        data: function() {
            return {
                status: this.follows
            }
        },

        computed: {
            buttonText() {
                return (this.status) ? 'Unfollow' : 'Follow';
            }
        },

        methods: {
            followUser() {
                axios.post('/follow/' + this.userId)
                    .then(res => {
                        this.status = !this.status;

                        //TODO: fix this hack when not lazy
                        let followersCount = document.getElementById('followers-count');
                        this.status ? followersCount.innerText++ : followersCount.innerText--;
                    })
                    .catch(err => {
                        if (err.response.status === 401) {
                            window.location = '/login';
                        }
                    })
            }
        }
    }
</script>
