<?php
include("conexao.php");

/* <label for="imagem">Insira uma imagem do produto:</label>
        <p><input class="form-control" type="file" name="imagem"/></p>*/
?>

<!DOCTYPE html>
<html>

<head>
    <title>cadastro de produto em <?php echo $nomeEmpresa?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
    <!--CABECALHO-->
    <header>
        <div class="cabecalho">
            <a class="cabecalho-logo" href="menu.html">nues<br>otro</a>
        </div>
    </header>


    <form class="form-produto" name="cadProduto" action="gravaProduto.php" method="post" enctype="multipart/form-data">
        <input class="input-form" type="hidden" name="idProduto" value="<?php echo $idProduto;?>">
        <input class="input-form" type="text" name="nomeProduto" id="nomeProduto" placeholder="insira o nome">
        <input class="input-form" type="text" name="categoria" id="categoria" placeholder="insira uma categoria">
        <input class="input-form" type="text" name="descricaoProduto" id="descricaoProduto" placeholder="insira uma descrição...">
        <input class="input-form" type="text" name="estoque" id="estoque" placeholder="insira a qntd no estoque">
        <input class="input-form" type="text" name="preco" id="preco" placeholder="insira o preço">
        <input class="input-form" type="text" name="cnpj" id="cnpj" placeholder="insira o cnpj da empresa">

        <input class="entrar-btn" type="submit" value="cadastrar">
    </form>
</body>
</html>