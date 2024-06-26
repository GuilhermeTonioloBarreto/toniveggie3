<?php
// esta função retorna todos os alimentos cadastrados do usuário e do usuário geral
function alimentosReadAll($currentUserId){

  // Pegar constantes do database
  require 'databaseConstants.php';

  // conectar ao banco de dados
  $conn = new mysqli(SERVERNAME, USERNAME, PASSWORD, DBNAME);

  // Checar conexão
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $select = "
    SELECT
      alimentos.id, alimentos.nome as nome, 
      unidadesDeMedida.nome as unidade, alimentos.usuarioId
    FROM alimentos
    INNER JOIN unidadesDeMedida ON alimentos.unidadeDeMedidaId = unidadesDeMedida.id
    WHERE alimentos.usuarioId = " . GENERAL_USER_ID . "  OR alimentos.usuarioId = $currentUserId;
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