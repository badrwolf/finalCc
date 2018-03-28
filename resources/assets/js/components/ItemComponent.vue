<template>
    <button @click="showItem">Show Item</button>
</template>

<script>
    export default {
        props: [
            'nom',
            'prenom'
        ],
        data() {
            return {

            }
        },
        methods: {
            showItem() {
                console.log(this.post);
                alert(this.post.prenom);
                this.$emit('change-parent', {
                    post: this.post,
                    other: 'a string',
                });
            }
        }
    }
</script>

<style scoped>

</style>