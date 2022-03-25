<?php
session_start();
if(isset($_POST["senha"]) and isset($_POST["email"])){
$senha = $_POST["senha"];
$email = $_POST["email"];

if(!empty($senha)){
include("conexao.php");
$sql="select * from usuario where email='$email' and senha='$senha'";
$res = mysqli_query($conexao,$sql);
$linha = mysqli_num_rows($res);
if ($linha == 1) {
  $row = mysqli_fetch_assoc($res);
     
  if ($senha['senha'] == $senha) {

      echo "Logged in!";

      header("Location: menu.html");

      exit();
}
else{
  //echo "tente novamente!";
  header("login.html");
}
}
}
}
?>