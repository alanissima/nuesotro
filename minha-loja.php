<!doctype html>
<html>
<head>
    <title> minha loja </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>  
    <form name="confirmar" action="minha-loja.php" method="post">
        <label>confirme o cnpj da sua loja:</label>
        <input type="text" name="cnpj" id="cnpj">
        <input type="submit" value="Confirmar">
    </form>
    </html>

<?php
require_once __DIR__ . "/conexao.php";

$cnpj = $_POST['cnpj'];
$consulta = mysqli_query($conexao,"select idProduto, nomeProduto, descricaoProduto, estoque, preco, categoria from produto where cnpj = '$cnpj'");
$num_linhas = mysqli_num_rows($consulta);

if ($num_linhas != 0) {
for ($i = 0; $i < $num_linhas; $i++) {
    $dados = mysqli_fetch_array($consulta);
    $nomeProduto = $dados["nomeProduto"];
    $descricaoProduto = $dados["descricaoProduto"];
    $estoque = $dados["estoque"];
    $preco = $dados["preco"];
    $categoria = $dados["categoria"];
    //$imagem = $dados["imagem"];

    echo"   <div class='resultado'>
                <div class='produto-imagem'> imagem </div>
        
                <div class='produto-info'>
                    <span class='produto-nome'> $nomeProduto </span><br>
                    <span class='produto-descricao'> $descricaoProduto </span>
                    <br><br>
                    estoque: $estoque<br>
                    preço unitário: $preco<br>
                    categoria: $categoria<br><br>
                </div>
        
                <div class='produto-acoes'>
                    <button class='acao editar' type='submit' value='editar'>
                        <img class='editar' src='images/editar-verde.png' onmouseover='this.src='images/editar-roxo.png';' onmouseout='this.src='images/editar-verde.png';'>
                    </button>
        
                    <button class='acao excluir' type='submit' value='editar'>
                        <a href='excluirProduto.html?idProduto=<?php echo $idProduto;?>'><img class='excluir' src='images/excluir-verde.png' onmouseover='this.src='images/excluir-roxo.png';' onmouseout='this.src='images/excluir-verde.png';'></a>
                    </button>
                </div>
            </div>";
}
}
?>