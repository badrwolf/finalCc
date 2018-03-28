<template id="Listacts">
    <div class="row">
        <div class="pull-right">
            <router-link class="btn btn-xs btn-primary" v-bind:to="{path: '/add-act'}">

                <span class="glyphicon glyphicon-plus"></span>
                Ajouter Actualité
            </router-link>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Titre</th>
                <th>Image</th>
                <th class="col-md-2">Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(act, index) in filteredActs">
                <td>{{ index + 1 }}</td>
                <td>{{ act.titre }}</td>

                <td><img style="display:block;" width="150" height="150"  :src="'http://localhost:8000/'+act.image" class="img"/></td>
                <td>
                    <table class="table">
                        <td>
                   <router-link class="btn btn-warning btn-xs" v-bind:to="{name: 'Editact', params: {id: act.id}}"><i class="fa fa-eye" aria-hidden="true"></i>Edit</router-link>
                        </td>
                  <!--  <Editact :key="act.id" :initialAct="act"  @changed="changed"/>-->
                        <td>
                    <Deleteact ::key="act.titre" :act="act" @change-parent="deletePost(index)"/>
                        </td>
                        <td>
                    <Viewact :key="act.description" :act="act"/>
                        </td>
                    </table>





                </td>
             </tr>
             </tbody>
         </table>
     </div>
 </template>

 <script>

     import Editact from './Editactualite'
     import Deleteact from './Deleteactualite'
     import  Viewact from './Viewactualite'
     export default {
         components: {
             Editact,
             Deleteact,
             Viewact
         },

         data:function(){

             return {acts: ''};
         },
         created: function() {
             let uri = 'http://localhost:8000/actualites/';
             Axios.get(uri).then((response) => {
                 this.acts = response.data;
             });
         },
         computed: {
             filteredActs: function(){
                 if(this.acts.length) {
                     return this.acts;
                 }
             }
         },
         methods:{
                 deletePost(index){
                     this.acts.splice(index,1)
                 },
             changed(pay){
                 let uri = 'http://localhost:8000/actualites/';
                 Axios.get(uri).then((response) => {
                     this.acts = response.data;
                 });
             },


         }
     }


 </script>
<style>
    .center {
        margin: auto;
        width: 90%;
        border: 3px solid black;
        padding: 10px;
        background: white;

    }



</style>
.img{
width:3px;
}
.mod {
border-spacing: 60px;
}