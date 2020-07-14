<template>
    <div class="container">
        <button :type="type" class="my-button" v-text="test.name"></button>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')

            axios.post('api/vue', {})
                .then(response => {
                    this.test = response.data;
                });
        },

        data: function() {
            return {
                test: {},
            }
        },

        props: [
            'text',
            'type'
        ]
    }
</script>

<style>
    .my-button {
        background-color: darkgray;
    }
</style>