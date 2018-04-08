<template id="Viewact">

            <div>
                <h3> <font color="red">Modifier l'actualité</font></h3>
                <form>
                    <div class="form-group">
                        <h2>Titre</h2>
                        <div> {{ act.titre }}</div>
                    </div>
                    <div id="app">
                        <h2>Description</h2>
                        <div  v-html="act.description"></div>
                    </div>
                    <div class="form-group">
                        <h2>Image</h2>
                        <img :src="'http://localhost:8000/'+act.image" style="display:block;" width="50%" height="50%" class="img"/>

                    </div>
                </form>
            </div>


</template>

<script>

    export default {
        data: function () {
            return {act: {titre: '', description: '',image:''}}
        },
        created: function(){
            let uri = 'http://localhost:8000/actualites/'+this.$route.params.id+'/edit';
            Axios.get(uri).then((response) => {
                this.act = response.data;
            });
        },


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

