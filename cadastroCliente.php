<?php
include("conexao.php");

$nomeCliente = $_POST["nomeCliente"];
$senha = $_POST["senha"];
$cpf = $_POST["cpf"];
$cidade = $_POST["cidade"];
$telefone = $_POST["telefone"];
$email = $_POST["email"];

$sqlCadastrarCliente = mysqli_query($conexao,"insert into cliente(nomeCliente,cpf)
value('$nomeCliente','$cpf')") or die("Erro ao gravar registro. " . mysqli_error($conexao));


$sqlCadastrarEndereco = mysqli_query($conexao, "insert into endereco(cidade) value('$cidade')")  or die("Erro ao gravar registro. " . mysqli_error($conexao));

$sqlCadastrarUsuario = mysqli_query($conexao,"insert into usuário(senha,telefone,email) value('$senha','$telefone','$email')") or die("Erro ao gravar registro. " . mysqli_error($conexao));
/*header('Location: lista-filmes.php'); pra onde direcionar depois*/

