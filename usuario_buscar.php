<?php
$page = 'buscar_usuario';
require('includes/header.php');
?>
<div class="content p-1">
    <div class="list-group-item">
        <div class="d-flex">
            <div class="mr-auto p-2">
                <h2 class="display-4 titulo">Pesquisar Usuário</h2>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                <input type="text" class="form-control" id="palavra" placeholder="Buscar por...">
            </div>
            <div class=" col-sm-3">
                <button class="btn btn-default bg-warning text-dark" id="buscar" type="button">Buscar</button>
            </div>
        </div>
        <br>
        <div id="dados"> Aqui sera p resultado!!</div>
        <script>
            function buscar(palavra) {
                //O método $.ajax(); é o responsável pela requisição
                $.ajax({
                    //Configurações
                    type: 'POST', //Método que está sendo utilizado.
                    dataType: 'html', //É o tipo de dado que a página vai retornar.
                    url: 'usuario_busque.php', //Indica a página que está sendo solicitada.
                    //função que vai ser executada assim que a requisição for enviada
                    beforeSend: function() {
                        $("#dados").html("Carregando...");
                    },
                    data: {
                        palavra: palavra
                    }, //Dados para consulta
                    //função que será executada quando a solicitação for finalizada.
                    success: function(msg) {
                        $("#dados").html(msg);
                    }
                });
            }


            $('#buscar').click(function() {
                buscar($("#palavra").val())
            });
        </script>
    </div>
</div>
<?php
require('includes/footer.php');
?>