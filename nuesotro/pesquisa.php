<?php
    include_once("conexao.php");
    $pesquisa = $_GET["pesquisa"];
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styles.css">

    <title>pesquisa em nuesotro</title>
</head>

<body>
    <!--CABECALHO-->
    <header>
        <div class="cabecalho">
            <a class="cabecalho-logo" href="menu.html">nues<br>otro</a>
        </div>
    </header>
    
     <!--BARRA DE PESQUISA-->
     <form class="pesquisa" name="pesquisa" action="pesquisa.php" method="get">
        <input class="pesquisa-texto" type="text" name="pesquisa" id="pesquisa" placeholder="o que você procura?">

        <button class="acao" type="submit" value="pesquisar">
            <img class="pesquisa-imagem" src="images/pesquisar-verde.png" onmouseover="this.src='images/pesquisar-roxo.png';" onmouseout="this.src='images/pesquisar-verde.png';">
        </button>
    </form>


    <?php
        if (!(empty($pesquisa))) {
            $registrosNome = mysqli_query($conexao, "select idProduto, imagem, nomeProduto, descricaoProduto, estoque, preco, categoria from
                produto where nomeProduto like '%$pesquisa%' or categoria like '%$pesquisa%'");

            $num_linhas = mysqli_num_rows($registrosNome);

            if ($num_linhas == 0) {
                echo "nenhum produto encontrado!";
            
            } else {

            for ($i = 0; $i < $num_linhas; $i++) {
                $dados = mysqli_fetch_array($registrosNome);
                $idProduto = $dados["idProduto"];
                $nomeProduto = $dados["nomeProduto"];
                $descricaoProduto = $dados["descricaoProduto"];
                $estoque = $dados["estoque"];
                $preco = $dados["preco"];
                $categoria = $dados["categoria"];
                $imagem = $dados["imagem"];

                echo"   <div class='resultado'>
                            <div class='produto-imagem'> <img src = $imagem height='150' width='150'> </div>
                    
                            <div class='produto-info'>
                                <span class='produto-nome'> $nomeProduto </span><br>
                                <span class='produto-descricao'> $descricaoProduto </span>
                                <br><br>
                                estoque: $estoque<br>
                                preço unitário: $preco<br>
                                categoria: $categoria<br><br>
                            </div>
                    
                            <div class='produto-acoes'>                    
                                <button class='acao excluir' type='submit' value='excluir'>
                                <a href='excluirProduto.html?idProduto=<?php echo $idProduto;?>'><img class='excluir' src='images/excluir-verde.png' onmouseover='this.src='images/excluir-roxo.png';' onmouseout='this.src='images/excluir-verde.png';'></a>                                
                                </button>
                            </div>
                        </div>";
            }
        }
        } else {
        $registrosNome = mysqli_query($conexao, "select * from produto");
        $num_linhas = mysqli_num_rows($registrosNome);
        for ($i = 0; $i < $num_linhas; $i++) {
            $dados = mysqli_fetch_array($registrosNome);
            $idProduto = $dados["idProduto"];
            $nomeProduto = $dados["nomeProduto"];
            $descricaoProduto = $dados["descricaoProduto"];
            $estoque = $dados["estoque"];
            $preco = $dados["preco"];
            $categoria = $dados["categoria"];
            //$imagem = $dados["imagem"];
            //<a href='verProduto.php' class='detalhesProduto'>detalhes</a><br>

            echo"   <div class='resultado'>
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
                                <a href='excluirProduto.html?idProduto=$idProduto'><img class='excluir' src='images/excluir-verde.png' onmouseover='this.src='images/excluir-roxo.png';' onmouseout='this.src='images/excluir-verde.png';'></a>                                
                                </button>
                            </div>
                        </div>";
        }
    }
    ?>

</body>
</html>