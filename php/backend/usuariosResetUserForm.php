<?php
/* 
Este formulário reseta o id do usuário na sessão currentUserId
*/

// inicia ou retoma uma seção - necessário para o recebimento de alertas
session_start();

$_SESSION['currentUserId'] = "";
$_SESSION['alertaStatus'] = "1";
$_SESSION['alertaMensagem'] = "O usuário do site foi resetado" ;

header('Location: ./../frontend/usuarios.php');
exit;

?> 