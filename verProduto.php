
/*require_once __DIR__ . "/conexao.php";

$idProduto = $_GET['idProduto'];

$consulta = mysqli_query($conexao, "select nomeProduto, descricaProduto, estoque, preco, categoria from produto where idProduto = '$idProduto'");

$produto = $consulta->fetch_array(MYSQLI_ASSOC);

?>


<!--<div style="border:solid 1px;" >
        <div> imagem </div>
        <div>
            <?= $produto["nomeProduto"] ?><br>
            <?= $produto["descricao"] ?><br><br>
            estoque: <?= $produto["estoque"] ?><br>
            preço unitário: <?= $produto["preco"] ?><br>
            categoria:<?= $produto["categoria"] ?><br><br>

        </div>
    </div>-->

    <?php
    require_once __DIR__ . "/conexao.php";
    
    $idProduto = $_GET['idProduto'];
    
    $consulta = mysqli_query($conexao, "select nomeProduto, descricaoProduto, estoque, preco, categoria from produto where idProduto = '$idProduto'");
    
    $produto = $consulta->fetch_array(MYSQLI_ASSOC);
    ?>
    
    <!DOCTYPE html>
    <html lang="pt-br">
    
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" type="text/css" href="styles.css">
    
      <title>ver detalhes em nuesotro</title>
    </head>
    
    <body>
      <!--CABECALHO-->
      <header>
        <div class="cabecalho">
          <a class="cabecalho-logo" href="menu.html">nues<br>otro</a>
        </div>
      </header>
    
      <br><br><br>
    
      <div class="resultado" style="background-color: rgba(247, 231, 231, 0.315); width:60%;margin-left:14em;">
        <div class="produto-imagem"> imagem </div>
    
        <div class="produto-info">
          <span class="produto-nome"> <?= $produto["nomeProduto"] ?></span><br>
          <?= $produto["descricaoProduto"] ?>
          <br><br>
          estoque: <?= $produto["estoque"] ?><br>
          preço unitário: <?= $produto["preco"] ?><br>
          categoria: <?= $produto["categoria"] ?> <br>
          <a href='minha-loja.php' class='produto-detalhes'>ver loja</a><br><br>
        </div>
    
    
      </div>
    
    </body>
    </html>
    