<template>
    <div class="task">
        <div class="col-lg-12 col-md-12">
            <table class="table">
                <tbody>
                    <tr>
                        <td width="5%">
                            <input type="checkbox" :checked="status === 1" ref="testesom" :id="this.id" :value="this.status" @change="check($event)" aria-label="Chebox para permitir input text">
                        </td>
                        <td width="83%"><h2>{{ name | properCase }}</h2></td>
                        <td class="td-left">
                            <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" @click="update(id)" title="Editar"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                            <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Excluir" @click="del"><i class="fa fa-trash" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <modal v-show="isModalVisible"  @close="closeModal"/>
    </div>
</template>

<script>
  import modal from './ModalComponent.vue';
  export default {
    data() {
      return {
        tasks: [],
        working: false,
        testesom: false,
        isModalVisible: false,
      }
    },
    methods: {
      update(val) {
          console.log('task update', val);
         //this.$emit('update', this.id, val.target.selectedOptions[0].value);
         this.showModal();
      },
      del() {
        this.$emit('delete', this.id);
      },
       check: function(e) {
          this.$parent.status(this.id, (this.$props.status == 0) ? 1 : 0);
       },
       showModal() {
        this.isModalVisible = true;
      },
      closeModal() {
        this.isModalVisible = false;
      }
    },
    components: {
      modal
    },
    props: ['id', 'name', 'description', 'remember', 'finished', 'status'],
    filters: {
      properCase(string) {
        return string.charAt(0).toUpperCase() + string.slice(1);
      }
    }
  }
</script>

<style>
    .task{
        background-color: #ACBDD2;
        color: #001830;
        margin-top: 10px;
    }
    table{
        margin:0;
        padding:0;
        border-collapse:collapse;
        background:#fff;
        width:100%;
        text-align:left;
    }

    td,th{
        padding : 10px;
        border-top : 1px solid rgba(0,0,0,0.1);
        border-bottom : 1px solid rgba(0,0,0,0.1);
    }

    tbody tr:hover{
        background: #F0F8FD;
        transform: scale(1,1);
        -webkit-transform: scale(1,1);
        -moz-transform: scale(1,1);
        box-shadow: 0 2px 8px rgba(0,0,0,0.2);
        -webkit-box-shadow: 0 2px 8px rgba(0,0,0,0.2);
        -moz-box-shadow: 0 2px 8px rgba(0,0,0,0.2);
    }
    .td-left{
        text-align: right;
    }
</style>

