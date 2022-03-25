<?php
session_start();
if(isset($_POST["email"]) ){
$email = $_POST["email"];
$tipoUsuario = $_POST['tipoUsuario'];

if(!(empty($email) )) {
include("conexao.php");
$sql="select * from usuario where email = '$email' ";
$res = mysqli_query($conexao,$sql);
$linha = mysqli_num_rows($res);
if($linha==0) {
session_destroy();

if ($_POST['tipoUsuario'] == 'empresa'){
header("Location: cadastroEmpresa.html");
    } else {
        header("Location: cadastroCliente.html");
    }
}
else {
session_destroy();
header("Location: login.html");
exit;
}
}
}

?>