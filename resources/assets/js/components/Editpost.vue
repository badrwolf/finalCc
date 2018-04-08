<template id="post-edit">
    <div>
        <button data-toggle="modal" :data-target="'#'+toggle" class="btn btn-warning btn-xs"><i
                class="fa fa-pencil" aria-hidden="true"></i> Edit
        </button>

        <div :id="toggle" class="modal fade editmodale">

            <!-- Modal content-->
            <div class="modal-dialog">

                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form v-on:submit.prevent = "updatePost(post.id)">
                            <div class="modal-header" align="center">
                                <img :src="'http://localhost:8000/'+post.image" style="display:block;" width="30%" height="30%" class="img"/>
                            </div>
                            <ul class="form-style-1">
                                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">


                                <li><label>Nom complet <span class="required">*</span></label><input name="nom" v-model="post.nom" v-validate="'required|alpha'" :class="{'input': true, 'is-danger': errors.has('nom') }"
                                                                                                     type="text" placeholder="Nom">
                                    <i v-show="errors.has('nom')" class="fa fa-warning"></i>
                                    <span v-show="errors.has('nom')" class="" style="color: red">{{ errors.first('nom') }}</span>&nbsp;<input class="form-control" placeholder="Prénom" v-model="post.prenom" required></input></li>

                                <li>
                                    <label>Email <span class="required">*</span></label>
                                    <input class="form-control"  v-model="post.email" required
                                           v-validate="'required|email'" :class="{'input': true, 'is-danger': errors.has('email') }" name="email" type="text" placeholder="Email">
                                    <span v-show="errors.has('email')" style="color: red" class="help is-danger">{{ errors.first('email') }}</span>                        </li>
                                <li>
                                    <label>CNE <span class="required">*</span></label>
                                    <input name="cne" v-model="post.cne" v-validate="'required|numeric'" :class="{'input': true, 'is-danger': errors.has('cne') }"
                                           type="text" placeholder="CNE">
                                    <i v-show="errors.has('cne')" class="fa fa-warning"></i>
                                    <span v-show="errors.has('cne')" class="" style="color: red">{{ errors.first('cne') }}</span>
                                </li>
                                <li>
                                    <label>CIN <span class="required">*</span></label>
                                    <input class="form-control"  v-model="post.cin" required
                                           v-validate="'required|alpha_num'" :class="{'input': true, 'is-danger': errors.has('cin') }" name="cin" type="text" placeholder="CIN">
                                    <span v-show="errors.has('cin')" class="help is-danger">{{ errors.first('cin') }}</span>
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
                                <li>
                                    <label>Image</label>
                                    <input type="file" @change="imageChanged" :src="'http://localhost:8000/'+post.image"  class="form-control">
                                </li>
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
        </div>
    </div>
</template>

<script>
    export default{
        props: [
            'initialPost'

        ],

        data: function () {
            return {
                toggle: 'toggle-edit-' + this.initialPost.id,
                post: $.extend({}, this.initialPost),

            }
        },
        computed: {
            togg() {
                return '#' + this.toggle;
            }
        },
        /* created: function(){
             let uri = 'http://localhost:8000/laureats/'+id+'/edit';
             Axios.get(uri).then((response) => {
                 this.post = response.data;
             });
         },*/
        methods: {
            updatePost: function(id) {
                let uri = 'http://localhost:8000/laureats/'+id;
                Axios.patch(uri, this.post).then((response) => {
                    this.$emit('changed', this.post);
                })
                $(this.togg).modal('hide')
            },
            imageChanged(e){
                console.log(e.target.files[0])
                var fileReader=new FileReader()

                fileReader.readAsDataURL(e.target.files[0])
                fileReader.onload=(e)=>{
                   // this.$emit('changed', this.post.image);

                    this.post.image=e.target.result
                }

            }
        }
    }
</script>
