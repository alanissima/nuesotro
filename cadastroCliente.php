<?php
include("conexao.php");

$nomeCliente = $_POST["nomeCliente"];
$cpf = $_POST["cpf"];

$sqlCadastrarCliente = mysqli_query($conexao,"insert into cliente(nomeCliente,cpf)
value('$nomeCliente','$cpf')") or die("Erro ao gravar registro. " . mysqli_error($conexao));
header("Location: menuC.html");

?>