<?php
include("conexao.php");
$nomeProduto = $_POST["nomeProduto"];
$categoria = $_POST["categoria"];
$descricaoProduto = $_POST["descricaoProduto"];
$estoque = $_POST["estoque"];
$preco = $_POST["preco"];
$cnpj = $_POST["cnpj"];
/*$imagem = $_FILES["imagem"];


$nomeFinal = time().'.jpg';
	if (move_uploaded_file($imagem['tmp_name'], $nomeFinal)) {
		$tamanhoImg = filesize($nomeFinal);

		$mysqlImg = addslashes(fread(fopen($nomeFinal, "r"), $tamanhoImg));
		
		'$mysqlImg'*/


$sqlGravaProduto = mysqli_query($conexao,"insert into produto(nomeProduto,categoria,descricaoProduto,estoque,preco,cnpj)
value('$nomeProduto','$categoria','$descricaoProduto','$estoque','$preco','$cnpj')") or die("Erro ao gravar registro. " . mysqli_error($conexao));
header('Location: pesquisa.php');
?>