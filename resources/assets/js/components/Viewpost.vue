<template id="post">
    <div>
        <button  data-toggle="modal" :data-target="'#'+toggleId" class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i>Show</button>
        <div :id="toggleId" class="modal fade editmodale">

            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">
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


                        </ul>
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
    export default {
        props: [
            'post'
        ],
        data() {
            return {
                toggleId: 'toggle-' + this.post.id
        }
        },
       methods: {
            showItem() {
                console.log(this.post);
             //  alert(this.post.email);
               // this.$emit('change-parent', {
                 //   post: this.post,
                  //  other: 'a string',
               // });
            }
        }
    }
</script>

<style type="text/css">
    /*@import 'bootstrap.min.css';*/

    .form-style-1 {
        margin:10px auto;
        max-width: 400px;
        padding: 20px 12px 10px 20px;
        font: 13px "Lucida Sans Unicode", "Lucida Grande", sans-serif;
    }
    .form-style-1 li {
        padding: 0;
        display: block;
        list-style: none;
        margin: 10px 0 0 0;
    }
    .form-style-1 label{
        margin:0 0 3px 0;
        padding:0px;
        display:block;
        font-weight: bold;
    }
    .form-style-1 input[type=text],
    .form-style-1 input[type=date],
    .form-style-1 input[type=datetime],
    .form-style-1 input[type=number],
    .form-style-1 input[type=search],
    .form-style-1 input[type=time],
    .form-style-1 input[type=url],
    .form-style-1 input[type=email],
    textarea,
    select{
        box-sizing: border-box;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        border:1px solid #BEBEBE;
        padding: 7px;
        margin:0px;
        -webkit-transition: all 0.30s ease-in-out;
        -moz-transition: all 0.30s ease-in-out;
        -ms-transition: all 0.30s ease-in-out;
        -o-transition: all 0.30s ease-in-out;
        outline: none;
    }
    .form-style-1 input[type=text]:focus,
    .form-style-1 input[type=date]:focus,
    .form-style-1 input[type=datetime]:focus,
    .form-style-1 input[type=number]:focus,
    .form-style-1 input[type=search]:focus,
    .form-style-1 input[type=time]:focus,
    .form-style-1 input[type=url]:focus,
    .form-style-1 input[type=email]:focus,
    .form-style-1 textarea:focus,
    .form-style-1 select:focus{
        -moz-box-shadow: 0 0 8px #88D5E9;
        -webkit-box-shadow: 0 0 8px #88D5E9;
        box-shadow: 0 0 8px #88D5E9;
        border: 1px solid #88D5E9;
    }
    .form-style-1 .field-divided{
        width: 49%;
    }

    .form-style-1 .field-long{
        width: 100%;
    }
    .form-style-1 .field-select{
        width: 100%;
    }
    .form-style-1 .field-textarea{
        height: 100px;
    }
    .form-style-1 input[type=submit], .form-style-1 input[type=button]{
        background: #4B99AD;
        padding: 8px 15px 8px 15px;
        border: none;
        color: #fff;
    }
    .form-style-1 input[type=submit]:hover, .form-style-1 input[type=button]:hover{
        background: #4691A4;
        box-shadow:none;
        -moz-box-shadow:none;
        -webkit-box-shadow:none;
    }
    .form-style-1 .required{
        color:red;
    }
</style>
