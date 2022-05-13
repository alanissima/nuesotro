<?php
include("conexao.php");

$nomeCliente = $_POST["nomeEmpresa"];
$cnpj = $_POST["cnpj"];
$telefone = $_POST["telefone"];
$siglaEstado = $_POST["siglaEstado"];
$cidade = $_POST["cidade"];


$sqlCadastrarEmpresa = mysqli_query($conexao,"insert into empresa(nomeEmpresa, cidade, siglaEstado cnpj, telefone)
value('$nomeEmpresa', '$cidade', '$siglaEndereco', '$endereco', '$cnpj','$telefone')") or die("Erro ao gravar registro. " . mysqli_error($conexao));
header("Location: menu.html");

?>