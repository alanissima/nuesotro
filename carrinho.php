<?php
session_start();          
          if(!isset($_SESSION['carrinho'])){
         $_SESSION['carrinho'] = array();
      }
        
      //adiciona produto
        
      if(isset($_GET['acao'])){
           
         //ADICIONAR CARRINHO
         if($_GET['acao'] == 'add'){
            $id = intval($_GET['id']);
            if(!isset($_SESSION['carrinho'][$id])){
               $_SESSION['carrinho'][$id] = 1;
            }else{
               $_SESSION['carrinho'][$id] += 1;
            }
         }
           
         //REMOVER CARRINHO
         if($_GET['acao'] == 'del'){
            $id = intval($_GET['id']);
            if(isset($_SESSION['carrinho'][$id])){
               unset($_SESSION['carrinho'][$id]);
            }
         }
           
         //ALTERAR QUANTIDADE
         if($_GET['acao'] == 'up'){
            if(is_array($_POST['prod'])){
               foreach($_POST['prod'] as $id => $qtd){
                  $id  = intval($id);
                  $qtd = intval($qtd);
                  if(!empty($qtd) || $qtd <> 0){
                     $_SESSION['carrinho'][$id] = $qtd;
                  }else{
                     unset($_SESSION['carrinho'][$id]);
                  }
               }
            }
         }
        
      }         
           
    ?>
<?php include_once "functions.php";
$uri = $_SERVER['PHP_SELF'];
$busca_title = mysqli_query($conexao, "SELECT * FROM menu WHERE url='$uri' limit 1");
 
while($title = mysqli_fetch_array($busca_title)){
    $titulos = $title['title'];    
}
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <meta name="Descrição" content="Loja Virtual"/>
        <meta name="Autor" content="Márcio Barbosa - arte.marciobarbosa@gmail.com"/>
        <title><?php echo $titulos; ?></title>
        <link rel="stylesheet" type="text/css" href="style.css"/>
        <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css"/>
        <script> 
            function mudafoto1(){
            document.getElementById("foto").src = "<?php echo $prod_img1; ?>";
            }
            function mudafoto2(){
            document.getElementById("foto").src = "<?php echo $prod_img2; ?>";
            }
            function mudafoto3(){
            document.getElementById("foto").src = "<?php echo $prod_img3; ?>";
            }
            function mudafoto4(){
            document.getElementById("foto").src = "<?php echo $prod_img4; ?>";
            }
        </script>
    </head>
    <body>
        <div class="container clearfix">
            <header id="cabecalho">
                <div class="central">
                    <div class="logo">
                        <a href="index.php"><img src="img/logotipo.jpg" alt="www.sualoja.com.br"/></a>
                    </div>
                    <form class="searchbar" method="get" action="busca.php">
                        <input type="text" class="cx-busca" name="busca" placeholder="Digite o que você procura"/>
                        <input type="image" src="img/magnifier.png" class="btn-busca" name="buscar" value="Buscar"/>
                    </form>                
                    <div class="login">
                        <?php
                            if(empty($_SESSION['usuario'])){
                            echo "<p><a href='login.php'>Login</a> | <a href='login.php'>Cadastre-se</a></p>";
                            }else{
                            echo "Seja bem Vindo ".$_SESSION['usuario'];
                            echo "<p><a href='#'>Meus Pedidos</a> | <a href='#'>Minha Conta</a></p>";
                            echo "<a href='sair.php'>Sair</a>";
                            }
                        ?>
                    </div>
                    <nav id="menu">                        
                        <div class="paginas-menu">
                            <?php
                            $sql_menu = "SELECT * FROM menu";
                            $busca_menu = mysqli_query($conexao, $sql_menu);
                                while($row_menu = mysqli_fetch_array($busca_menu)){
                                    $nome = $row_menu['nome'];
                                    $pagina = $row_menu['pagina'];
                                    echo "<a href='$pagina'><div class='menu'>$nome</div></a>";
                                }
                            ?>
                        </div>
                    </nav>
                </div>
            </header>
            <div class="interface">
                <table class="tabela-carrinho">
                <caption><h2 class="detalhes">Carrinho de Compras</h2></caption>
                    <thead>
          <tr>
            <th width="244">Produto</th>
            <th width="79">Quantidade</th>
            <th width="89">Preço</th>
            <th width="100">SubTotal</th>
            <th width="64">Remover</th>
          </tr>
    </thead>
            <form action="?acao=up" method="post">
    <tfoot>
           <tr>
            <td colspan="5"><input type="submit" value="Atualizar Carrinho" /></td>
            <tr>
            <td colspan="5"><a href="index.php">Continuar Comprando</a></td>
    </tfoot>
       
    <tbody>
               <?php
                     if(count($_SESSION['carrinho']) == 0){
                        echo '<tr><td colspan="5">Não há produto no carrinho</td></tr>';
                     }else{
                        require("functions.php");
                                                               $total = 0;
                        foreach($_SESSION['carrinho'] as $id => $qtd){
                              $sql   = "SELECT *  FROM produtos WHERE id= '$id'";
                              $qr    = mysqli_query($conexao, $sql) or die();
                              $ln    = mysqli_fetch_assoc($qr);
                                
                              $nome  = $ln['nome'];
                              $preco = $ln['valor'];
                              $sub   = $ln['valor'] * $qtd;
                                
                              $total += $ln['valor'] * $qtd;
                             
                           echo '<tr>       
                                 <td>'.$nome.'</td>
                                 <td><input type="text" size="3" name="prod['.$id.']" value="'.$qtd.'" /></td>
                                 <td>R$ '.$preco.'</td>
                                 <td>R$ '.$sub.'</td>
                                 <td><a href="?acao=del&id='.$id.'">Remove</a></td>
                              </tr>';
                        }
                           $total = $total;
                           echo '<tr>
                                    <td colspan="4">Total</td>
                                    <td>R$ '.$total.'</td>
                              </tr>';
                     }
               ?>
     
     </tbody>
        </form>
            </table>
        </div>
        <?php include_once 'footer.php'; ?>
    </body>
</html>