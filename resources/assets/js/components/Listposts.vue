<template id="Deletepost">
    <div class="row">
        <div class="pull-right">
            <button data-toggle="modal" data-target="#modal_theme_success">
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
                    <Deletepost :key="post.nom" :post="post"  @change-parent="deletePost(index)"/>
                        </td>
                        <td>
                    <Editpost :key="post.id" :initialPost="post"  @changed="changed"/>
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
                    cne: '',
                    cin: '',
                    telephone: '',
                    promo: '',
                    filiere: '',
                    nationalite: '',
                    pays: '',
                    ville: ''
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

            },

            deletePost(index){
                this.posts.splice(index,1)

                swal("Suppression de","avec succes","succes")
            },
                changed(pay){
                    let uri = 'http://localhost:8000/laureats/';
                    Axios.get(uri).then((response) => {
                        this.posts = response.data;
                    });
                },



        }


    }


</script>

<style>
    .center {
        margin: auto;
        width: 50%;
        border: 3px solid black;
        padding: 10px;
        background: white;

    }
</style>