<?php
include_once("conexao.php");
$pesquisa = $_GET["pesquisa"];

        $registrosNome = mysqli_query($conexao,"select nomeProduto, descricao, estoque, preco, categoria from
        produto where nomeProduto like '%$pesquisa%' or categoria like '%$pesquisa%'");

        $num_linhas = mysqli_num_rows($registrosNome);

        for($i;$i<$num_linhas;$i++){
        $dados = mysqli_fetch_array($registrosNome);
        $nomeProduto = $dados["nomeProduto"];
        $descricaoProduto = $dados["descricaoProduto"];
        $estoque = $dados["estoque"];
        $preco = $dados["preco"];
        $categoria = $dados["categoria"];
        //$imagem = $dados["imagem"];

        echo "<div>
                <div> imagem </div>
                <div> $nomeProduto<br>
                    $descricaoProduto<br><br>
                    estoque: $estoque<br>
                    preço unitário: $preco<br>
                    categoria: $categoria<br><br>
                </div>
            </div>";
        }
    ?>
