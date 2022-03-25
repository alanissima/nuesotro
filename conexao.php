<?php

$servidor = "localhost"; // Endereço do servidor (DNS ou IP direto)
$usuario = "root"; // Nome do usuário de acesso ao servidor
$senha = "bancodedados"; // Senha do usuário de acesso ao servidor
$banco = "bdnuesotro"; // Nome do banco de dados que será manipulado

$conexao = mysqli_connect($servidor,$usuario,$senha,$banco) or die ("Não foi
possível conectar-se ao servidor. Erro: ". mysqli_connect_error());
// ------ Seleciona o banco de dados especifico no servidor
/* Verifica se houve conexão com o banco de dados no servidor e mostra na tela.*/
if(isset($conexao)){
echo "Banco de dados selecionado com sucesso.";
}
?>