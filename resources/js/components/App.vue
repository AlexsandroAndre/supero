<template>
    <div id="app">
        <div class="heading">
            <img class=" ls-is-cached lazyloaded" src="https://www.supero.com.br/wp-content/themes/Supero2019_fast/imagens/supero_cor.svg" data-src="https://www.supero.com.br/wp-content/themes/Supero2019_fast/imagens/supero_cor.svg" alt="Marca Supero">
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="header-form">
                    <input type="text" v-on:keyup.enter="create" class="form-control" name="txt_name" id="txt_nome" placeholder="Adicionar uma tarefa"/>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12">
                <task-component
                        v-for="task in tasks"
                        v-bind="task"
                        :key="task.id"
                        @update="update"
                        @delete="del"
                ></task-component>
            </div>
        </div>
    </div>
</template>

<script>
  function Task({ id, name, description, remember, fineshed, status}) {
    this.id = id;
    this.name = name;
    this.description = description;
    this.remember = remember;
    this.fineshed = fineshed;
    this.status = status;
  }

  import TaskComponent from './TaskComponent.vue';
  export default {
    data() {
      return {
        tasks: [],
        working: false
      }
    },
    methods: {
      create(name) {
        this.mute = true;
        let data = {
            name : document.querySelector("input[name=txt_name").value,
        }
        window.axios.post('/api/task', data).then(({data}) => {
          this.tasks.unshift(new Task(data.data));
          this.mute = false;
        });
      },
      read() {
        this.mute = true;
        window.axios.get('/api/task').then(({ data }) => {
          data.forEach(task => {
            this.tasks.push(new Task(task));
          });
          this.mute = false;
        });
      },
      update(id, name) {
        this.mute = true;
        window.axios.put(`/api/task/${id}`, { name }).then(() => {
          this.tasks.find(task => task.id === id).name = name;
          this.mute = false;
        });
      },
      del(id) {
        this.mute = true;
        window.axios.delete(`/api/task/${id}`).then(() => {
          let index = this.tasks.findIndex(task => task.id === id);
          this.tasks.splice(index, 1);
          this.mute = false;
        });
      },
      status(id, status){
          this.mute = true;
          let param = {id:id, status:status};
          window.axios.put(`/api/task/${id}`, { param }).then(({data}) => {
            this.tasks.find(task => task.id === id).status = status;
            for(var i = 0; i < this.tasks.length; i++){
                if(this.tasks[i].id === id){
                    this.tasks.splice(i, 1);
                }
            }

            this.mute = false;
          });
      }
    },
    watch: {
      mute(val) {
        document.getElementById('mute').className = val ? "on" : "";
      }
    },
    components: {
      TaskComponent
    },
    created() {
      this.read();
    }
  }
</script>

<style>
    body{
        background-color: #EAEAEC;
        color: #001830;
    }
    .heading {
        width: 100%;
        padding: 5px;
        height: 60px;
        margin-bottom: 5px;
    }
    .heading, h1{
        color: #001830;
        font-weight: bold;
    }
    .header-form {
        width: 50%;
        margin: auto;
        width: 50%;
    }
    img {
        vertical-align: middle;
        border-style: none;
        width: 213px;
    }
</style>

