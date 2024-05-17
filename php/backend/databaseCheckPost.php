<?php

// verifica se a entrada de dados de input está correta
function checar_dados_post($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>