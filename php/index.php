<?php 
// inicia ou retoma uma seção
session_start(); 
?>

<strong>Backend toni veggie</strong>
<br />
<br />

<hr />
<strong>Cadastrar usuário</strong>
<form action = "backend/usuariosWrite1.php" method="POST">
    <label for="usuario-nome">Nome do usuário: </label>
    <input type="text" id="usuarioNome" name="usuarioNome" />
    <br />
    <button type="submit">Submit</button>
</form>
<hr />


<hr />
<strong>Alertas</strong>
<br />
<?php 
if($_SESSION["alertaStatus"] == "1"){
    echo "Sucesso: " . $_SESSION["alertaMensagem"];
} else if ($_SESSION["alertaStatus"] == "2"){
    echo "Erro: " . $_SESSION["alertaMensagem"];
}

?>
<hr />
