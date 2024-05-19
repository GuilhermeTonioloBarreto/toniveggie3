<?php
/* 
Este formulário registra o usuário no sistema

parâmetros de entrada
  usuarioNome
*/

// inicia ou retoma uma seção - necessário para o recebimento de alertas
session_start();

// Pegar constantes do database
require 'databaseConstants.php';

// checar dados recebidos do post
require 'databaseCheckPost.php';

// checar e resgatar dados recebidos do post
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $usuarioNome = checar_dados_post($_POST["usuarioNome"]);
}

// conectar ao banco de dados
$conn = new mysqli(SERVERNAME, USERNAME, PASSWORD, DBNAME);

// Checar conexão
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// condição 1 para o usuário não ser cadastrado: 
// nome do usuário está vazio
$condicao1 = strlen($usuarioNome) == 0;

if($condicao1){
  $_SESSION['alertaStatus'] = "2";
  $_SESSION['alertaMensagem'] = "O campo Nome está vazio";
}

// se nenhuma das condições foram alcançadas para não cadastrar o usuário
// o usuário pode ser cadastrado 
if(!$condicao1){
  $insert = "
    INSERT INTO `usuarios`(`nome`) VALUES ('$usuarioNome')
  ";
  $result = $conn->query($insert);

  if ($result === TRUE) {
    $_SESSION['alertaStatus'] = "1";
    $_SESSION['alertaMensagem'] = "A gravação do nome deu certo" ;

  } else {
    $_SESSION['alertaStatus'] = "2";
    $_SESSION['alertaMensagem'] = $conn->error;
    
  }
}

$conn->close();
header('Location: ./../frontend/usuarios.php');
exit;

?> 