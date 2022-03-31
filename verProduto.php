<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); 

require_once __DIR__ . "/conexao.php";

$idProduto = $_GET['id'];

$consulta = mysqli_query($conexao, "select nomeProduto, descricao, estoque, preco, categoria from produto where idProduto = $idProduto");

$produto = $consulta->fetch_array(MYSQLI_ASSOC);

?>



<div style="border:solid 1px;" >
        <div> imagem </div>
        <div>
            <?= $produto["nomeProduto"] ?><br>
            <?= $produto["descricao"] ?><br><br>
            estoque: <?= $produto["estoque"] ?><br>
            preço unitário: <?= $produto["preco"] ?><br>
            categoria:<?= $produto["categoria"] ?><br><br>

        </div>
    </div>