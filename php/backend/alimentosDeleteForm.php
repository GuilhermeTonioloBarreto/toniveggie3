<?php
/* 
Este formulário deleta um registro de alimento no sistema

parâmetros de entrada
  usuarioId
  alimentoId
*/

// inicia ou retoma uma seção - necessário para o recebimento de alertas
session_start();

// Pegar constantes do database
require 'databaseConstants.php';

// checar dados recebidos do post
require 'databaseCheckPost.php';

// checar e resgatar dados recebidos do post
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $usuarioId = checar_dados_post($_POST["usuarioId"]);
  $alimentoId = checar_dados_post($_POST["alimentoId"]);
}

// conectar ao banco de dados
$conn = new mysqli(SERVERNAME, USERNAME, PASSWORD, DBNAME);

// Checar conexão
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// condição 1 para o alimento não poder ser atualizado:
// é alimento que se deseja deletar foi criado pelo GENERAL_USER_ID
$select = "
	SELECT * FROM `alimentos` WHERE id = '$alimentoId';
";

$result = $conn->query($select);
$row = $result->fetch_assoc();
$condicao1 = $row["usuarioId"] == GENERAL_USER_ID;

if($condicao1){
  $_SESSION['alertaStatus'] = "2";
  $_SESSION['alertaMensagem'] = "Não é possível deletar um alimento cadastrado pelo sistema";
}

// se nenhuma das condições foram alcançadas para não deletar o produto
// o produto pode ser deletado 
if(!$condicao1){
  $delete = "
    DELETE FROM `alimentos` WHERE `id` = $alimentoId 
  ";
  $result = $conn->query($delete);

  if ($result === TRUE) {
    $_SESSION['alertaStatus'] = "1";
    $_SESSION['alertaMensagem'] = "A remoção do alimento deu certo" ;

  } else {
    $_SESSION['alertaStatus'] = "2";
    $_SESSION['alertaMensagem'] = $conn->error; ;
    
  }
}

$conn->close();
header('Location: ./../frontend/alimentos.php');
exit;

?> 