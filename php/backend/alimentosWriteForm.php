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

// checar dados recebidos do post
require 'databaseCheckPost.php';

// checar e resgatar dados recebidos do post
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $usuarioId = checar_dados_post($_POST["usuarioId"]);
  $alimentoNome = checar_dados_post($_POST["alimentoNome"]);
  $unidadeDeMedidaId = checar_dados_post($_POST["unidadeDeMedidaId"]);
}

// conectar ao banco de dados
$conn = new mysqli(SERVERNAME, USERNAME, PASSWORD, DBNAME);

// Checar conexão
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// condicao 1 para o alimento não poder ser cadastrado: o alimento já foi cadastrado
// previamente pelo GENERAL_USER_ID
$select = "
	SELECT * FROM `alimentos` WHERE nome = '$alimentoNome' AND usuarioId = " . GENERAL_USER_ID . ";
";

$result = $conn->query($select);
$condicao1 = $result -> num_rows > 0;

if($condicao1){
  $_SESSION['alertaStatus'] = "2";
  $_SESSION['alertaMensagem'] = "Alimento já cadastrado pelo sistema";
}

// condicao 2 para o alimento não poder ser cadastrado: o alimento já foi cadastrado
// previamente pelo próprio usuário 
$select = "
	SELECT * FROM `alimentos` WHERE nome = '$alimentoNome' AND usuarioId = '$usuarioId';
";

$result = $conn->query($select);
$condicao2 = $result -> num_rows > 0;

if($condicao2){
  $_SESSION['alertaStatus'] = "2";
  $_SESSION['alertaMensagem'] = "Alimento já cadastrado pelo usuário";
}

// condição 3 para o alimento não ser cadastrado: 
// nome do alimento está vazio
$condicao3 = strlen($alimentoNome) == 0;

if($condicao3){
  $_SESSION['alertaStatus'] = "2";
  $_SESSION['alertaMensagem'] = "O campo Alimento está vazio";
}

// se nenhuma das condições foram alcançadas para não cadastrar o produto
// o produto pode ser cadastrado 
if(!$condicao1 and !$condicao2 and !$condicao3){
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
}

$conn->close();
header('Location: ./../frontend/alimentos.php');
exit;

?> 