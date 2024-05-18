<?php
// esta função retorna todos os usuários cadastrados
function usuariosReadAll(){

  // Pegar constantes do database
  require 'databaseConstants.php';

  $servername = SERVERNAME;
  $username = USERNAME;
  $password = PASSWORD;
  $dbname = DBNAME;

  // conectar ao banco de dados
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Checar conexão
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $select = "
    SELECT * FROM `usuarios` WHERE 1
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