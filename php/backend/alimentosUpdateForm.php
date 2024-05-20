<?php
/* 
Este formulário atualiza um registro de alimento no sistema

parâmetros de entrada
  usuarioId
  alimentoId
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
  $alimentoId = checar_dados_post($_POST["alimentoId"]);
  $alimentoNome = checar_dados_post($_POST["alimentoNome"]);
  $unidadeDeMedidaId = checar_dados_post($_POST["unidadeDeMedidaId"]);
}

// conectar ao banco de dados
$conn = new mysqli(SERVERNAME, USERNAME, PASSWORD, DBNAME);

// Checar conexão
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// condicao 1 para o alimento não poder ser atualizado: 
// o novo nome do alimento já foi cadastrado previamente pelo GENERAL_USER_ID
$select = "
	SELECT * FROM `alimentos` WHERE nome = '$alimentoNome' AND usuarioId = " . GENERAL_USER_ID . ";
";

$result = $conn->query($select);
$condicao1 = $result -> num_rows > 0;

if($condicao1){
  $_SESSION['alertaStatus'] = "2";
  $_SESSION['alertaMensagem'] = "Alimento já cadastrado pelo sistema";
}

// condicao 2 para o alimento não poder ser atualizado: 
// o novo nome do alimento já foi cadastrado previamente pelo próprio usuário
$select = "
	SELECT * FROM `alimentos` WHERE nome = '$alimentoNome' AND usuarioId = '$usuarioId';
";

$result = $conn->query($select);
$condicao2 = $result -> num_rows > 0;

if($condicao2){
    $_SESSION['alertaStatus'] = "2";
    $_SESSION['alertaMensagem'] = "Alimento já cadastrado pelo usuário";
}

// condição 2 pode ser anulada se o usuário está apenas tentando 
// atualizar a unidade de medida do alimento

$select = "
	SELECT * FROM `alimentos` WHERE id = '$alimentoId';
";

$result = $conn->query($select);
$row = $result -> fetch_assoc();

if($row["unidadeDeMedidaId"] != $unidadeDeMedidaId){
  $condicao2 = false;  
  $_SESSION['alertaStatus'] = "";
  $_SESSION['alertaMensagem'] = "";
}

// condição 3 para o alimento não ser atualizado: 
// nome do alimento está vazio
$condicao3 = strlen($alimentoNome) == 0;

if($condicao3){
  $_SESSION['alertaStatus'] = "2";
  $_SESSION['alertaMensagem'] = "O campo Alimento está vazio";
}


// condição 4 para o alimento não poder ser atualizado:
// é alimento que se deseja atualizar o nome foi criado pelo GENERAL_USER_ID
$select = "
	SELECT * FROM `alimentos` WHERE id = '$alimentoId';
";

$result = $conn->query($select);
$row = $result->fetch_assoc();
$condicao4 = $row["usuarioId"] == GENERAL_USER_ID;

if($condicao4){
  $_SESSION['alertaStatus'] = "2";
  $_SESSION['alertaMensagem'] = "Não é possível atualizar um alimento cadastrado pelo sistema";
}

// se nenhuma das condições foram alcançadas para não atualizar o produto
// o produto pode ser atualizado 
if(!$condicao1 and !$condicao2 and !$condicao3 and !$condicao4){
  $update = "
    UPDATE `alimentos` SET `nome`='$alimentoNome',`unidadeDeMedidaId`='$unidadeDeMedidaId' 
    WHERE `id`='$alimentoId'
  ";
  $result = $conn->query($update);

  if ($result === TRUE) {
    $_SESSION['alertaStatus'] = "1";
    $_SESSION['alertaMensagem'] = "A atualização do alimento deu certo" ;

  } else {
    $_SESSION['alertaStatus'] = "2";
    $_SESSION['alertaMensagem'] = $conn->error; ;
    
  }
}

$conn->close();
header('Location: ./../frontend/alimentos.php');
exit;

?> 