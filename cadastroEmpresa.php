<?php
include("conexao.php");

$nomeCliente = $_POST["nomeEmpresa"];
$senha = $_POST["senha"];
$cnpj = $_POST["cnpj"];
$telefone = $_POST["telefone"];
//$cidade = $_POST["cidade"];
$email = $_POST["email"];

$sqlCadastrarEmpresa = mysqli_query($conexao,"insert into empresa(nomeEmpresa,cnpj,telefone)
value('$nomeEmpresa','$cnpj','$telefone')") or die("Erro ao gravar registro. " . mysqli_error($conexao));


//$sqlCadastrarEndereco = mysqli_query($conexao, "insert into endereco(cidade) value('$cidade')")  or die("Erro ao gravar registro. " . mysqli_error($conexao));

$sqlCadastrarUsuario = mysqli_query($conexao,"insert into usuario(senha,email) value('$senha','$email')") or die("Erro ao gravar registro. " . mysqli_error($conexao));
/*header('Location: lista-filmes.php'); pra onde direcionar depois*/