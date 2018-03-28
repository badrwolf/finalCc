<template id="post-delete">
  <div>

    <button @click="deletePost" data-toggle="modal" :data-target="toggleId" class="btn btn-danger btn-xs"><i  class="fa fa-trash-o" aria-hidden="true"></i>Delete</button>
    <div :id="toggleI" class="modal fade editmodale center ">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <div class="modal-body">

                <h3>Supprimer le laureat {{ post.nom  }}</h3>
                <form v-on:submit.prevent = "deletePost(post.id)">
                  <p>êtes vous sure</p>
                  <button class="btn btn-xs btn-danger" type="submit" name="button">Supprimer</button>

                </form>
              </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
      </div>
    </div>
  </div>
  </div>


</template>


<script>
    require('./css/del.css')
  //  require('./css/bootstrap.min.css')
    export default {
        props: [
            'post'
        ],
        data() {
            return {
                toggleI: 'toggle-delete-' + this.post.id
            }
        },
        computed: {
            toggleId() {
                return '#' + this.toggleI;
            }
        },
        methods: {
            deletePost: function(id,index) {

              //  console.log(index);
                //  let urii = 'http://localhost:8000/laureats/${id}';
                let urii = 'http://localhost:8000/laureats/'+id;



               Axios.delete(urii,this.post).then((response) => {
                   this.$emit('change-parent', {
                       post: this.post
                   });
               })
             //  this.modal('hide')

                $(this.toggleId).modal('hide')

                //Axios.delete(urii,this.post).splice(index,1)



                //TODO: this.posts.remove object id*/
                // this.posts.splice(index, 1)
                /* let uri = 'http://localhost:8000/laureats/'+id;
                 Axios.get(uri).then((response) => {
                     this.posts = response.data;
                 });
                 this.posts = this.posts.filter(function (item) {
                     return filteredPost();                });*/
            },
            showItem() {
                console.log(this.post);
                alert(this.post.nom);
                this.$emit('change-parent', {
                    post: this.post,
                    other: 'a string',
                });
            }
        }
    }
</script>