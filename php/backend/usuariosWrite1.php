<?php
/* 
Esta função registra o usuário no sistema

parâmetros de entrada
  usuarioNome
*/

// inicia ou retoma uma seção
session_start();

// Pegar constantes do database
require 'databaseConstants.php';

$servername = SERVERNAME;
$username = USERNAME;
$password = PASSWORD;
$dbname = DBNAME;

// checar dados recebidos do post
require 'databaseCheckPost.php';

// checar e resgatar dados recebidos do post
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $usuarioNome = checar_dados_post($_POST["usuarioNome"]);
}

// conectar ao banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Checar conexão
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$insert = "
  INSERT INTO `usuarios`(`name`) VALUES ('$usuarioNome')
";

if ($conn->query($insert) === TRUE) {
  $_SESSION['alertaStatus'] = "1";
  $_SESSION['alertaMensagem'] = "A gravação do nome deu certo" ;
  
  $conn->close();
  header('Location: ./../index.php');
  exit;

} else {
  $_SESSION['alertaStatus'] = "2";
  $_SESSION['alertaMensagem'] = $conn->error; ;
  
  $conn->close();
  header('Location: ./../index.php');
  exit;
}

?> 