<?php
include("conexao.php");
$nomeProduto = $_POST["nomeProduto"];
$categoria = $_POST["categoria"];
$descricaoProduto = $_POST["descricao"];
$estoque = $_POST["estoque"];
$preco = $_POST["preco"];
$cnpj = $_POST["cnpj"];

$sqlGravaProduto = mysqli_query($conexao,"insert into produto(nomeProduto,categoria,descricao,estoque,preco,cnpj)
value('$nomeProduto','$categoria','$descricao','$estoque','$preco','$cnpj')") or die("Erro ao gravar registro. " . mysqli_error($conexao));
header('Location: pesquisa2.php');
?>