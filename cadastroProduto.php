<?php
include("conexao.php");

/* <label for="imagem">Insira uma imagem do produto:</label>
        <p><input class="form-control" type="file" name="imagem"/></p>*/
?>

<!doctype html>
<html>
    <head>
    <meta charset="utf-8">
    <title>Cadastrar Produto</title>
    </head>
    
    <body>
        <form name="cadProduto" action="gravaProduto.php" method="post" enctype="multipart/form-data">
        <p><input type="text" name="nomeProduto" id="nomeProduto" placeholder="nome"></p>
        <p><input type="text" name="categoria" id="categoria" placeholder="categoria"></p>
        <p><input type="text" name="descricao" id="descricao" placeholder="descrição"></p>
        <p><input type="text" name="estoque" id="estoque" placeholder="estoque"></p>
        <p><input type="text" name="preco" id="preco" placeholder="preço"></p>
        <p><input type="text" name="cnpj" id="cnpj" placeholder="digite o cnpj da empresa"></p>

        <p><input type="submit" value="Cadastrar"></p>
        </form>
    </body>
</html>