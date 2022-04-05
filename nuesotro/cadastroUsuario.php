<?php
include("conexao.php");

$email = $_POST["email"];
$senhalogin = $_POST["senhalogin"];

$sqlCadastrarUsuario = mysqli_query($conexao,"insert into usuario(senhalogin,email) value('$senhalogin','$email')") or die("Erro ao gravar registro. " . mysqli_error($conexao));


if ($_POST['tipoUsuario'] == 'empresa'){
header("Location: cadastroEmpresa.html");
    } else {
        header("Location: cadastroCliente.html");
    }
?>