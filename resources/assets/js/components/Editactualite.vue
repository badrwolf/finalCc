<template id="edit/:id">
    <div>
        <h3>Modifier l'actualité</h3>
        <form v-on:submit.prevent = "updateAct">
            <div class="form-group">
                <label>Titre</label>
                <input name="titre" v-model="act.titre" type="text" placeholder="titre">
            </div>
            <div id="app">
                <label>Description</label>
                <vue-editor v-model="act.description"/>
            </div>
            <div class="form-group">
                <label>Image</label>
                <input type="file" @change="imageChanged" class="form-control">
            </div>
            <button type="submit" class="btn btn-xs btn-primary">Créer Actualité</button>
            <router-link class="btn btn-xs btn-warning" v-bind:to="'/'">Cancel</router-link>
        </form>
    </div>
</template>
<script>
    require('./css/del.css')

    import Vue from 'vue';
    import VeeValidate from 'vee-validate';
    import { VueEditor } from 'vue2-editor'
    Vue.use(VeeValidate);
    export default{
        components: {
            VueEditor
        },
        data: function () {
            return {act: {titre: '', description: '',image:''}}
        },
        created: function(){
            let uri = 'http://localhost:8000/actualites/'+this.$route.params.id+'/edit';
            Axios.get(uri).then((response) => {
                this.act = response.data;
            });
        },
        methods: {
            updateAct: function() {
                let uri = 'http://localhost:8000/actualites/'+this.$route.params.id;
                Axios.patch(uri, this.act).then((response) => {
                    this.$router.push({name: 'Listacts'})
                })
            },
            imageChanged(e){
                console.log(e.target.files[0])
                var fileReader=new FileReader()
                fileReader.readAsDataURL(e.target.files[0])
                fileReader.onload=(e)=>{
                    this.act.image=e.target.result
                }
            }
        }
    }
</script>


