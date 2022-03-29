<?php
include_once("conexao.php");
$pesquisa = $_GET["pesquisa"];
?>


    <!doctype html>
    <html>
        <head>
        <meta charset="utf-8">
        <title>nuesotro</title>
        </head>

        <body>
            <form name="pesquisa" action="pesquisa.php" method="get">
            <input type="text" name="pesquisa" id="pesquisa" placeholder="o que você procura?">
            <input type="submit" value="Pesquisar">
            </form>


            <?php
            $registrosNome= mysqli_query($conexao,"select nomeProduto, descricaoProduto, estoque, preco, categoria, imagem from
            produto where nomeProduto like '%$pesquisa%' or categoria like '%$pesquisa%'");

            $num_linhas = mysqli_num_rows($registrosNome);

            for($i;$i<$num_linhas;$i++){
            $dados = mysqli_fetch_array($registrosNome);
            $nomeProduto = $dados["nomeProduto"];
            $descricaoProduto = $dados["descricaoProduto"];
            $estoque = $dados["estoque"];
            $preco = $dados["preco"];
            $categoria = $dados["categoria"];
            $imagem = $dados["imagem"];

            echo "<div>
                    <div> $imagem </div>
                    <div> $nomeProduto<br>
                          $descricaoProduto<br><br>
                          estoque: $estoque<br>
                          preço unitário: $preco<br>
                          categoria: $categoria<br><br>
                    </div>
                  </div>";
            }
            ?>
        </body>
    </html>