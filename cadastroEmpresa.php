<?php
include("conexao.php");

$nomeCliente = $_POST["nomeEmpresa"];
$cnpj = $_POST["cnpj"];
$telefone = $_POST["telefone"];
//$cidade = $_POST["cidade"];

$sqlCadastrarEmpresa = mysqli_query($conexao,"insert into empresa(nomeEmpresa,cnpj,telefone)
value('$nomeEmpresa','$cnpj','$telefone')") or die("Erro ao gravar registro. " . mysqli_error($conexao));
header("Location: menu.html");

?>