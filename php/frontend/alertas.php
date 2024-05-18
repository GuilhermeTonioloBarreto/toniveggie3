<?php
if($_SESSION["alertaStatus"] == "1"){
    echo "Sucesso: " . $_SESSION["alertaMensagem"];
} else if ($_SESSION["alertaStatus"] == "2"){
    echo "Erro: " . $_SESSION["alertaMensagem"];
}
?>