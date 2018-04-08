<template id="add-post">
    <transition name="modal">

    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Ajouter laureat</h4>
            </div>
            <div class="modal-body">
                <form v-on:submit.prevent = "createPost">

                    <ul class="form-style-1">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">


                        <li><label>Nom complet <span class="required">*</span></label><input name="nom" v-model="post.nom"
                                                                                             type="text" placeholder="Nom">
                           &nbsp;<input class="form-control" placeholder="Prénom" v-model="post.prenom" required></input></li>

                        <li>
                            <label>Email <span class="required">*</span></label>
                            <input class="form-control"  v-model="post.email" required>
                                                     </li>
                        <li>
                            <label>CNE <span class="required">*</span></label>
                            <input name="cne" v-model="post.cne"
                                   type="text" placeholder="CNE">

                        </li>
                        <li>
                            <label>CIN <span class="required">*</span></label>
                            <input class="form-control"  v-model="post.cin" required
                                 name="cin" type="text" placeholder="CIN">
                        </li>
                        <li>
                            <label>Téléphone</label>
                            <input name="telephone" v-model="post.telephone" v-validate="'required|numeric'" :class="{'input': true, 'is-danger': errors.has('telephone') }"
                                   type="text" placeholder="Téléphone">
                            <i v-show="errors.has('telephone')" class="fa fa-warning"></i>
                            <span v-show="errors.has('telephone')" class="" style="color: red">{{ errors.first('telephone') }}</span>
                        </li>
                        <li>
                            <label>Promotion <span class="required">*</span></label>
                            <select v-model="post.promo">
                                <option SELECTED>2013</option>
                                <option>2014</option>
                                <option>2015</option>
                                <option>2016</option>
                                <option>2017</option>
                                <option>2018</option>
                            </select>
                        </li>
                        <li>
                            <label>filière<span class="required">*</span></label>
                            <select v-model="post.filiere">
                                <option SELECTED>Informatique</option>
                                <option>Industriel</option>
                                <option>Electrique</option>
                            </select>
                        </li>
                        <li>
                            <label>Nationalité</label>
                            <input name="nationalite" v-model="post.nationalite" v-validate="'required|alpha'" :class="{'input': true, 'is-danger': errors.has('nationalite') }"
                                   type="text" placeholder="nationalite">
                            <i v-show="errors.has('nationalite')" class="fa fa-warning"></i>
                            <span v-show="errors.has('nationalite')" class="" style="color: red">{{ errors.first('nationalite') }}</span>
                        </li>
                        <li>
                            <label>Pays</label>
                            <input name="pays" v-model="post.pays" v-validate="'required|alpha'" :class="{'input': true, 'is-danger': errors.has('pays') }"
                                   type="text" placeholder="pays">
                            <i v-show="errors.has('pays')" class="fa fa-warning"></i>
                            <span v-show="errors.has('pays')" class="" style="color: red">{{ errors.first('pays') }}</span>
                        </li>
                        <li>
                            <label>Ville</label>
                            <input name="ville" v-model="post.ville" v-validate="'required|alpha'" :class="{'input': true, 'is-danger': errors.has('ville') }"
                                   type="text" placeholder="ville">
                            <i v-show="errors.has('ville')" class="fa fa-warning"></i>
                            <span v-show="errors.has('ville')" class="" style="color: red">{{ errors.first('ville') }}</span>
                        </li>
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" @change="imageChanged" :src="'http://localhost:8000/'+post.image"  class="form-control">
                        </div>

                        <li>
                            <input type="submit" value="Submit" />
                        </li>
                    </ul>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
    </transition>

</template>

<script>
    require('./css/add.css')
   // require('./css/bootstrap.min.css')

    import Vue from 'vue';
    export default {
        data: function () {
            return {post: {nom: '', prenom: '',email:'',cne:'',cin:'',telephone:'',promo:'',filiere:'',nationalite:'',pays:'',ville:'',image:''}}
        },
        methods: {
            createPost: function() {
                let uri = 'http://localhost:8000/laureats/';
                Axios.post(uri, this.post).then((response) => {
                   // this.post.push({name: 'Listposts'})
                    this.$emit('change', {
                        post: this.post
                    });

                })

                $('#modal_theme_success').modal('hide')

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
<style>

</style>