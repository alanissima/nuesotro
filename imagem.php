<?php
// Incluindo arquivo de conexão
require_once('conexao.php');
$id = (int) $_GET['idProduto'];
// Selecionando fotos
$stmt = $pdo->prepare("SELECT imagem FROM produto WHERE idProduto like '$id'");
$stmt->bindParam($id, PDO::PARAM_INT);
// Se executado
if ($stmt->execute())
{
    // Alocando foto
    $imagem = $stmt->fetchObject();
    
    // Se existir
    if ($imagem != null)
    {
        // Definindo tipo do retorno
        header('Content-Type: '. $imagem->tipo);
        
        // Retornando conteudo
        echo $imagem->conteudo;
    }
}