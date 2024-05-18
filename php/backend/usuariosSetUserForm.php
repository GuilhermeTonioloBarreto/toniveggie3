<?php
/* 
Este formulário seta o id do usuário na sessão currentUserId

parâmetros de entrada
  usuarioId
*/

// inicia ou retoma uma seção - necessário para o recebimento de alertas
session_start();

// checar dados recebidos do post
require 'databaseCheckPost.php';

// checar e resgatar dados recebidos do post
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuarioId = checar_dados_post($_POST["usuarioId"]);
  }

$_SESSION['currentUserId'] = $usuarioId;
$_SESSION['alertaStatus'] = "1";
$_SESSION['alertaMensagem'] = "O usuário escolhido foi setado como usuário atual" ;

header('Location: ./../frontend/usuarios.php');
exit;

?> 