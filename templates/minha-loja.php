<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styles.css">

    <title>minha loja em nuesotro</title>
</head>

<body>
    <!--CABECALHO-->
    <header>
        <div class="cabecalho">
            <a class="cabecalho-logo" href="menu.html">nues<br>otro</a>
        </div>
    </header>
</body></html>

<?php
require_once __DIR__ . "/conexao.php";


$cnpj = $_POST['cnpj'];

$consulta = mysqli_query($conexao, "select nomeEmpresa, cidade, siglaEstado from empresa where cnpj = '$cnpj'");
$num_linhas = mysqli_num_rows($consulta);

if ($num_linhas != 0) {
    //for ($i = 0; $i < $num_linhas; $i++) {
        $dados = mysqli_fetch_array($consulta);
        $nomeEmpresa = $dados["nomeEmpresa"];
        $cidade = $dados["cidade"];
        $siglaEstado = $dados["siglaEstado"];

        echo"<div class='body-container'>
                <div class='loja'>
                    <span class='loja-nome'> $nomeEmpresa </span>
                    <span class='loja-local'>$cidade - $siglaEstado</span>
                    <br><br>
                </div>

                <div class='loja'>
                    <button class='adicionar-btn'>
                        <a class='adicionar-btn' href='cadastroProduto.php'> adicionar produto </a>
                    </button>

                </div>
            </div>"; 
    }

$consulta = mysqli_query($conexao, "select idProduto, nomeProduto, descricaoProduto, estoque, preco, categoria from produto where cnpj = '$cnpj'");
$num_linhas = mysqli_num_rows($consulta);

if ($num_linhas != 0) {
    for ($i = 0; $i < $num_linhas; $i++) {
        $dados = mysqli_fetch_array($consulta);
        $idProduto = $dados["idProduto"];
        $nomeProduto = $dados["nomeProduto"];
        $descricaoProduto = $dados["descricaoProduto"];
        $estoque = $dados["estoque"];
        $preco = $dados["preco"];
        $categoria = $dados["categoria"];
        //$imagem = $dados["imagem"];

        echo "   <div class='resultado'>
                            <div class='produto-imagem'> imagem </div>
                    
                            <div class='produto-info'>
                                <span class='produto-nome'> $nomeProduto </span><br>
                                <span class='produto-descricao'> $descricaoProduto </span>
                                <br><br>
                                estoque: $estoque<br>
                                preço unitário: $preco<br>
                                categoria: $categoria<br>
                                código: $idProduto<br><br>
                            </div>
                    
                            <div class='produto-acoes'>                    
                                <button class='acao excluir' type='submit' value='excluir'>
                                <a href='excluirProduto.html?idProduto=<?php echo $idProduto;?>'><img class='excluir' src='images/excluir-verde.png' onmouseover='this.src='images/excluir-roxo.png';' onmouseout='this.src='images/excluir-verde.png';'></a>                                
                                </button>
                            </div>
                        </div>";
    }
}
?>