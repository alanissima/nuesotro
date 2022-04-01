<!doctype html>
<html>
<head>
    <title>editar produto</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>  
    <form name="excluir" action="editarProduto.php" method="post">
        <label>confirme o código do produto que você deseja excluir:</label>
        <input type="text" name="idProduto" id="idProduto">
        <input type="submit" value="Confirmar">
    </form>
    </html>

<?php
include("conexao.php");
$idProduto = $_POST["idProduto"];

$sqlRegistros = mysqli_query($conexao,"select idProduto, nomeProduto, descricaoProduto, estoque, preco, categoria from
produto where idProduto = '$idProduto'") or die("Erro na execusão da consulta" . mysqli_error($conexao));

$num_linhas = mysqli_num_rows($sqlRegistros);

$dados = mysqli_fetch_array($sqlRegistros);
$idProduto = $dados["idProduto"];
$nomeProduto = $dados["nomeProduto"];
$descricaoProduto = $dados["descricaoProduto"];
$estoque = $dados["estoque"];
$preco = $dados["preco"];
$categoria = $dados["categoria"];
?>

<!doctype html>
<html>
<head><meta charset="utf-8">
</head>
<body>

<form name="form1" action="atualizarProduto.php?" method="post">
<input type="hidden" name="idProduto" value="<?php echo $idProduto;?>">
<p>
<label>Tidulo:</label>
<input type="text" name="nomeProduto" value="<?php echo $nomeProduto; ?>">
</p>
<p>
<label>Duração:</label>
<input type="text" name="descricaoProduto" value="<?php echo $descricaoProduto; ?>">
</p>
<p>
<label>Valor: R$ </label>
<input type="text" name="estoque" value="<?php echo $estoque; ?>">
</p>
<label>Valor: R$ </label>
<input type="text" name="preco" value="<?php echo $preco; ?>">
</p>
<label>Valor: R$ </label>
<input type="text" name="categoria" value="<?php echo $categoria; ?>">
</p>
<p>
<input type="submit" name="editar" value="editar">
</p>
</form>
</body>
</html>