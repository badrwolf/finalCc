<template id="act-delete">
    <div>
        <button @click="deletePost" data-toggle="modal" :data-target="toggleId" class="btn btn-danger btn-xs"><i  class="fa fa-trash-o" aria-hidden="true"></i>Delete</button>
        <div :id="toggleI" class="modal fade editmodale center ">
            <div class="modal-dialog">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-header" align="center">
                     <h3>Supprimer l'actualité: {{ act.titre }}</h3>
                         <form v-on:submit.prevent = "deletePost(act.id)">
                             <p>êtes vous sure</p>
                             <button class="btn btn-xs btn-danger" type="submit" name="button">Supprimer</button>
                         </form>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: [
            'act'
        ],
        data() {
            return {
                toggleI: 'toggle-delete-' + this.act.id
            }
        },
        computed: {
            toggleId() {
                return '#' + this.toggleI;
            }
        },

        methods: {

            deletePost: function(id,index) {
                let uri = 'http://localhost:8000/actualites/'+id;
                Axios.delete(uri, this.act).then((response) => {
                    this.$emit('change-parent', {
                        act: this.act
                    });                })
                $(this.toggleId).modal('hide')

            }
        }
    }
</script>
