<?php
/* 
Este formulário registra o alimento no sistema

parâmetros de entrada
  usuarioId
  alimentoNome
  unidadeDeMedidaId
*/

// inicia ou retoma uma seção - necessário para o recebimento de alertas
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
  $usuarioId = checar_dados_post($_POST["usuarioId"]);
  $alimentoNome = checar_dados_post($_POST["alimentoNome"]);
  $unidadeDeMedidaId = checar_dados_post($_POST["unidadeDeMedidaId"]);
}

// conectar ao banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Checar conexão
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$insert = "
    INSERT INTO `alimentos`(`nome`, `unidadeDeMedidaId`, `usuarioId`) VALUES
    ('$alimentoNome', '$unidadeDeMedidaId', '$usuarioId')
";
$result = $conn->query($insert);

if ($result === TRUE) {
  $_SESSION['alertaStatus'] = "1";
  $_SESSION['alertaMensagem'] = "A gravação do alimento deu certo" ;

} else {
  $_SESSION['alertaStatus'] = "2";
  $_SESSION['alertaMensagem'] = $conn->error; ;
  
}

$conn->close();
header('Location: ./../frontend/alimentos.php');
exit;

?> 