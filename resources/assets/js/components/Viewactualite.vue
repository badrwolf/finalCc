<template id="Viewact">
    <div class="mod" align="right">
        <button  data-toggle="modal" :data-target="'#'+togg" class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i>Show</button>
        <div :id="togg" class="modal fade editmodale center">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <div>
    <table class="table">
        <thead>
        <tr >
            <th > Titre</th>
            <th >Description</th>
            <th  >Image</th>
        </tr>
        </thead>
        <tbody>
            <td >{{ act.titre }}</td>
            <td > <div  v-html="act.description"/> </td>
            <td  ><img :src="'http://localhost:8000/'+act.image" style="display:block;" width="40%" height="40%" class="img"/></td>
        </tbody>
    </table>
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
                togg: 'togg-' + this.act.id
            }
        },


    }


</script>
<style>


    /* The Close Button */



.mod {
border-spacing: 60px;
}
.container-content {
    width: 600px;
    height: 600px;

}
.table-header {
    width: inherit;
    overflow: hidden;
}


.red{
height: 5px;
width: 1220px;
background-color: red;

float:left;
height: 150px;
width: inherit;
overflow-y: scroll;
padding-right: 16px;
}

</style>
