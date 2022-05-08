<?php
include('../include/header.php');
include('../conexao/conexao.php');
$id_produto = $_REQUEST['id_produto'];
$sql = "select * from produto where id_produto=$id_produto";
$resultado = mysqli_query($conexao, $sql);
$dados = mysqli_fetch_array($resultado);
 ?>
<hr>
<section class="container">
  <br> 
   <div class="row">
  <div class="col-sm-6">
    <img src="../fotosprodutos/<?=$dados['imagem']; ?>" style="height:0 auto;width:80%;padding:10px;" alt="imagem" id="alignleft" class="img-responsivo">
  </div>
<div class="col-sm-6">
    <h3><?= $dados['descricao']; ?></h3>
	<b>Categoria:</b> <?=$dados['categoria'];?>
	<br/>
	<b>Preço: </b> R$  <?=$dados['preco']; ?>
	<br/>
  <a href="carrinho.php?acao=add&id_produto=<?php echo $dados['id_produto']?>" id="botao" class="btn btn-primary" role="button" value="<?= $dados['id_produto']; ?>">Comprar</a>
  
</div>
</div>
</section>
<hr>
<?php require ('../include/footer.php');?>