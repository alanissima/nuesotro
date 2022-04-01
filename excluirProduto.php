<?php
include("conexao.php");
$idProduto = $_POST["idProduto"];
$sqlDeleta = mysqli_query($conexao,"delete from produto where idProduto = '$idProduto'") 
or die("Erro ao deletar arquivo. " . mysqli_error($conexao));
header('Location: pesquisa.php');
?>