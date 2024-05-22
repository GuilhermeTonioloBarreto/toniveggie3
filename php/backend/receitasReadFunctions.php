<?php
// esta função retorna o nome a descrição 
//de todas as receitas cadastradas pelo usuário
function receitasReadAllPreview($currentUserId){

  // Pegar constantes do database
  require 'databaseConstants.php';

  // conectar ao banco de dados
  $conn = new mysqli(SERVERNAME, USERNAME, PASSWORD, DBNAME);

  // Checar conexão
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $select = "
    SELECT `id`, `nome`, `descricao` FROM `receitas` WHERE `usuarioId` = $currentUserId
  ";
  $result = $conn->query($select);
  $conn->close();

  if ($result->num_rows > 0) {
    return $result->fetch_all(MYSQLI_ASSOC);
  } else {
    return false;
  }
}

?> 