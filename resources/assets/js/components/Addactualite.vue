<template id="add-act">
    <div>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

        <h3>Ajouter Actualité</h3>
        <form v-on:submit.prevent = "createAct">
            <div class="form-group">
                <label>Titre</label>
                <input name="titre" v-model="post.titre"
                       type="text" placeholder="titre">


            </div>
            <div id="app">
                <label>Description</label>
                <vue-editor v-model="post.description"></vue-editor>
            </div>

            <div class="form-group">
                <label>Image</label>
                <input type="file" @change="imageChanged" :src="'http://localhost:8000/'+post.image"  class="form-control">
            </div>
            <button type="submit" class="btn btn-xs btn-primary">Créer Actualité</button>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </form>
    </div>
</template>
<script>
    require('./css/del.css')

    import Vue from 'vue';
    import VeeValidate from 'vee-validate';
    import { VueEditor } from 'vue2-editor'
    Vue.use(VeeValidate);
    export default {
        components: {
            VueEditor
        },
        data: function () {

            return {post: {titre: '', description: '',image:''}}

        },
        methods: {


            createAct: function() {
                let uri = 'http://localhost:8000/actualites/';
                Axios.post(uri, this.post).then((response) => {

                    this.$router.push({name: 'Listacts'})
                })

            },
            imageChanged(e){
                console.log(e.target.files[0])
                var fileReader=new FileReader()
                fileReader.readAsDataURL(e.target.files[0])
                fileReader.onload=(e)=>{
                    this.post.image=e.target.result
                }

            }

        }
    }
</script>


