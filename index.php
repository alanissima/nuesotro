<?php
session_start();
if(isset($_POST["email"]) && isset($_POST["senhalogin"])){
$email = $_POST["email"];
$senhalogin = $_POST["senhalogin"];

if(!(empty($email) or empty($senhalogin))){
include("conexao.php");
$sql= "SELECT * from usuario where email = '$email' and senhalogin ='$senhalogin'";
echo "$sql";
$res = mysqli_query($conexao,$sql);
$linha = mysqli_num_rows($res);

if($linha == 1) {
    $_SESSION["$email"] = $_POST["email"];
    $_SESSION["$senhalogin"] = $_POST["senhalogin"];
    header("Location: menu.html");

exit;
}

else {
    session_destroy();
    echo "Login ou senha incorretos!";
}

}

    }
?>