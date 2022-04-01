<?php
require_once __DIR__ . "/conexao.php";
/* ARRUMAR */
$consulta = mysqli_query($conexao,"select idProduto, nomeProduto, descricao, estoque, preco, categoria from produto where cnpj = '$cnpj'");
$num_linhas = mysqli_num_rows($consulta);
$produtos = $consulta->fetch_all(MYSQLI_ASSOC);


/*echo "<pre>";
print_r($produtos);
echo "</pre>";*/

/*
for($i = 0; $i<$num_linhas; $i++) {
    $dados            = mysqli_fetch_array($registrosNome);
    $nomeProduto      = $dados["nomeProduto"];
    $descricaoProduto = $dados["descricao"];
    $estoque          = $dados["estoque"];
    $preco            = $dados["preco"];
    $categoria        = $dados["categoria"];
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
*/
?>

<?php foreach ($produtos as $produto) : ?>

    <div style="border:solid 1px;" >
        <div> imagem </div>
        <div>
            <?= $produto["nomeProduto"] ?><br>
            <?= $produto["descricao"] ?><br><br>
            estoque: <?= $produto["estoque"] ?><br>
            preço unitário: <?= $produto["preco"] ?><br>
            categoria:<?= $produto["categoria"] ?><br><br>

            <a href="verProduto.php?id=<?= $produto["idProduto"] ?>">detalhes</a>
        </div>
    </div>

<?php endforeach; ?>