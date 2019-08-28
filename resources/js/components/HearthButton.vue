<template>
    <div>
        <div class="d-flex justify-content-end">
            <span v-text="likesCounted" class="font-weight-bold mr-1 align-self-center"></span>
            <svg
                @click="likePost"
                xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                width="25" height="25"
                viewBox="0 0 50 50"
                style="cursor: pointer;">
                <g id="surface1">
                    <path
                        v-bind:style="[this.status ? {fill: '#ff0000'} : {fill: '#cccccc'}]"
                          d="M 25 47.300781 L 24.359375 46.769531 C 23.144531 45.753906 21.5 44.652344 19.59375 43.378906
                           C 12.167969 38.40625 2 31.601563 2 20 C 2 12.832031 7.832031 7 15 7 C 18.894531 7 22.542969
                            8.734375 25 11.699219 C 27.457031 8.734375 31.105469 7 35 7 C 42.167969 7 48 12.832031
                             48 20 C 48 31.601563 37.832031 38.40625 30.40625 43.378906 C 28.5 44.652344 26.855469
                              45.753906 25.640625 46.769531 Z ">
                    </path>
                </g>
            </svg>
        </div>
    </div>
</template>

<script>
    export default {
        name: "HearthButton",
        props: ['postId', 'likes', 'likesCount'],

        data: function () {
            console.log(this.likesCount)
            return {
                status: this.likes,
                likesCounted: this.likesCount
            }
        },

        methods: {
            likePost() {
                axios.post('/like/' + this.postId)
                    .then(res => {
                        this.status = !this.status;
                        this.status ? this.likesCounted++ : this.likesCounted--;
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

<style scoped>

</style>
