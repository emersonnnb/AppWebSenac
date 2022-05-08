<?php
$page = 'pedidoCodigo';
require('includes/header.php');
?>
<div class="content p-1">
    <div class="list-group-item">
        <div class="d-flex">
            <div class="mr-auto p-2">
                <h2 class="display-4 titulo">Pesquisar por código</h2>
                <hr>
            </div>
        </div>
        <div class="col-md-10">
            <div class="row">
                <div class="col-md-12">
                    <div class="content-box-large">
                        <div class="panel-heading">
                            <div class="panel-options">
                                <a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
                                <a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <form class="form-system" method="post" action="usuario_pesquisa_usuario.php">

                                <div class="form-group">
                                    <label class="col-sm-1 control-label">Nome</label>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <input type="text" name="nome" class="form-control" />
                                        </div>
                                        <div class=" col-sm-3">
                                            <input type="submit" class="btn btn-warning" name="botao" value="Pesquisar" />
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include('includes/footer.php');
?>