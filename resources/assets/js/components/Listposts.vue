<template>
    <div class="row">
        <div class="pull-right">
            <button data-toggle="modal" data-target="#modal_theme_success" class="btn btn-default">
                <span class="glyphicon glyphicon-plus"></span>
                Ajouter Laureat
            </button>

        </div>
        <div id="modal_theme_success" class="modal fade editmodale">
            <Addpost @change="change"/>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Laureat Nom</th>
                <th>Laureat Prenom</th>
                <th>Email</th>
                <th>CNE</th>
                <th class="col-md-2">Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(post,index) in filteredPosts">
                <td>{{ index +1 }}</td>
                <td>{{ post.nom }}</td>
                <td>{{ post.prenom }}</td>
                <td>{{ post.email }}</td>
                <td>{{ post.cne }}</td>
                <td>
                    <table class="table">
                        <td>
                    <Viewpost :key="post.prenom" :post="post"/>
                        </td>
                        <td>
                    <Deletepost :key="post.nom" :post="post"  @change-parent="deletePost(post.nom,post.prenom,index)"/>
                        </td>
                        <td>
                  <Editpost :key="post.id" :initialPost="post"  @changed="changed()"/>
                           <!-- <router-link class="btn btn-warning btn-xs" v-bind:to="{name: 'Editpost', params: {id: post.id}}"><i class="fa fa-eye" aria-hidden="true"></i>Edit</router-link>-->

                        </td>
                    </table>


                    <!-- <item-component :post="post" @change-parent="changeEmail" />-->





                </td>




            </tr>
            </tbody>
        </table>


    </div>
</template>

<script>
    import swal from 'sweetalert'
    import Viewpost from './Viewpost';
    import Deletepost from './Deletepost';
    import Editpost from './Editpost';
    export default {
        components:
            {
                Deletepost,
                Viewpost,
                Editpost,
            },
        // ,


        data: function () {

            return {
                posts: {
                    nom: '',
                    prenom: '',
                    email:'',
                    cne: '',
                    cin: '',
                    telephone: '',
                    promo: '',
                    filiere: '',
                    nationalite: '',
                    pays: '',
                    ville: '',
                    image:''
                }
            };
        },
        created: function () {
            let uri = 'http://localhost:8000/laureats/';

            Axios.get(uri).then((response) => {
                this.posts = response.data;
            });


        },
        computed: {
            filteredPosts: function () {
                if (this.posts.length) {
                    return this.posts;
                }


            },
        },
        methods:

            {
            change(pay){
                //var poo=this.post

                const post = pay.post;

               this.posts.unshift(post);
                swal("Ajout de "+" "+"<"+post.nom+" "+post.prenom+">","  avec succes")

            },

            deletePost(nom,prenom,image,index){
                this.posts.splice(index,1)

                swal("Suppression de"+" "+nom+" "+prenom," avec succes")
            },
                changed(){
                    let uri = 'http://localhost:8000/laureats/';
                    Axios.get(uri).then((response) => {
                        this.posts = response.data;
                    });
                   // this.post.image=pay.target.result
                    swal("Modification"," avec succes")
                    /*console.log(e.target.files[0])
                    var fileReader=new FileReader()
                    fileReader.readAsDataURL(e.target.files[0])
                    fileReader.onload=(e)=>{
                        this.post.image=e.target.result
                    }*/
                },








    }}


</script>

<style lang="scss">
    @import '/css/bootstrap.min.css';
    .center {
        margin: auto;
        width: 50%;
        border: 3px solid black;
        padding: 10px;
        background: white;

    }


</style>