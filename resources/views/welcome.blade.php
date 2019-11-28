<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="css/app.css" rel="stylesheet">
    <title>Task</title>
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

        .task{
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
        .modal-body > h3 {
            color: #001830;
        }
    </style>
</head>
<body>
    <main role="main" class="container">

        <div class="starter-template">
            <div id="app">
                <div class="heading">
                    <img class=" ls-is-cached lazyloaded" src="https://www.supero.com.br/wp-content/themes/Supero2019_fast/imagens/supero_cor.svg" data-src="https://www.supero.com.br/wp-content/themes/Supero2019_fast/imagens/supero_cor.svg" alt="Marca Supero">
                </div>

                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="header-form">
                            <input type="text" class="form-control name" name="txt_name" id="txt_nome" placeholder="Adicionar uma tarefa"/>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 col-md-12 road-map">

                    </div>
                </div>
            </div>

            <div id="message" class="modal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Modal body text goes here.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            <button type="button" class="btn-save btn btn-primary">Salvar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!--<script src="js/app.js"></script>-->
    <script src="js/supero.js"></script>

</body>
</html>
