require('./bootstrap');


$(function(){
    read();

    //event enter para adicionar novas tarefas
    $(document).keypress(function(event){
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if(keycode == '13'){

           if($('.name').val() !== "" || $('.name').val() !== undefined)
           {
                create($('.name').val());
                $('.name').val('');
                read();
           }
        }
        event.stopPropagation();
    });
});


let tasks = [];

function Task({ id, name, description, remember, fineshed, status}) {
    this.id = id;
    this.name = name;
    this.description = description;
    this.remember = remember;
    this.fineshed = fineshed;
    this.status = status;
}

let create = (n)=> {
    let data = {
        name : n,
    }
    window.axios.post('/api/task', data).then(({data}) => {
      tasks = [];
      read();
      $('.modal-title').empty().append('Sucesso!');
      $('.modal-body').empty().append('<h3>' + data.message + '</h3>');
      $('.btn-save').hide();
      $('.modal').modal('show');
    });
  }

let read = ()=>{
    window.axios.get('/api/task').then(({ data }) => {
        data.forEach(task => {
            tasks.push(new Task(task));
        });
        html();
    });

}
let update = (id)=>{
    let index = tasks.find(task => task.id == id);
    $('.modal-title').empty().append(index.name);
    $('.modal-body').empty().append(customForm(index));
    $('.modal').modal('show');
    $('.btn-save').click(function(){
        var ndescription = $('.txt_description').val()
        var uid = $('.hd_id').val();
        var param = {id: uid, description:ndescription }
        window.axios.put(`/api/task/${uid}`, {param}).then(({ data }) => {

        });
    });
}

let del = (id)=>{
    window.axios.delete(`/api/task/${id}`).then(({ data }) => {
        tasks = [];
        read();
        $('.modal-title').empty().append('Sucesso!');
        $('.modal-body').empty().append('<h3>' + data.message + '</h3>');
        $('.btn-save').hide();
        $('.modal').modal('show');
    });
}

let status =(id, status)=>{
    let param = {id:id, status:(status == 0) ? 1: 0};
    window.axios.put(`/api/task/${id}`, { param }).then(({data}) => {
      console.log(data);
      tasks = [];
      read();


    });
}

let html = ()=>{
    var inner = "";
    for(var i=0; i< tasks.length; i++)
    {
        var cheked = (tasks[i].status == 1) ? "checked" : "";

        inner += "<div class='task " + cheked + "'>";
        inner += "<table class='table'>";
        inner += "<tbody><tr>";
        inner += "<td width='5%'><input type='checkbox' state='"+tasks[i].id +"' value='" + tasks[i].status + "' " + cheked + "></td>";
        inner += "<td width='83%'><h2>" + tasks[i].name + "</h2></td>";
        inner += "<td class='td-left'>";
        inner += "<a href='javascript:void(0);' update='" + tasks[i].id + "' class='pencil' data-toggle='tooltip' data-placement='top' title='Editar'>";
        inner += "<i class='fa fa-pencil' aria-hidden='true'></i></a>&nbsp;";
        inner += "<a href='javascript:void(0);' del='" + tasks[i].id + "' class='trash' data-toggle='tooltip' data-placement='top' title='Excluir'>";
        inner += "<i class='fa fa-trash' aria-hidden='true'></i></a>";
        inner += "</td>";
        inner += "</tr></tbody>";
        inner += "</table>";
        inner += "</div>";
    }

    $('.road-map').empty().append(inner);

    $('a').click(function(){
        if($(this).hasClass('pencil')){
            update($(this).attr('update'));
        }
        if($(this).hasClass('trash')){
            del($(this).attr('del'));
        }
    });

    $('[data-toggle="tooltip"]').tooltip();

    $('input[type=checkbox]').click(function(){
        if($(this).attr('state') != "" || $(this).attr('state') != undefined){
            status($(this).attr('state'), $(this).val());
        }
    });
}

let customForm = (obj)=>{
    var inner = "<form>";
    inner += "<div class='form-group'><label for='txt_description'>Anotação</label>";
    inner += "<textarea class='form-control txt_description' id='txt_description' name='txt_description'>" + obj.description + "</textarea></div>";
    inner += "<input type='hidden' class='hd_id' id='hd_id' name='hd_id' value='" + obj.id + "'>";
    inner += "</form>";
    return inner;
}




