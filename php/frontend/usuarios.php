<?php
// inicia ou retoma uma seção - necessário para o recebimento de alertas
session_start(); 

// invoca a leitura de usuários
require './../backend/usuariosReadFunctions.php';
$nomes = usuariosReadAll();
?>

<hr />
<strong>Cadastrar usuário</strong>
<form action = "../backend/usuariosWriteForm.php" method="POST">
    <label>Nome do usuário: </label>
    <input type="text" name="usuarioNome" />
    <br />
    
    <button type="submit">Submit</button>
</form>

<hr />

<strong>Setar usuário no site</strong>
<form action = "../backend/usuariosSetUserForm.php" method="POST">
    <label>Nome do usuário: </label>
    <select name="usuarioId">
        <?php
        foreach($nomes as $nome){
            echo "<option value=" . $nome['id'] . "> " . $nome['nome'] . "</option>";
        }
        ?>
    </select>
    <br />
    
    <button type="submit">Submit</button>
</form>

<hr />

<strong>Resetar usuário no site</strong>
<form action = "../backend/usuariosResetUserForm.php" method="POST">    
    <button type="submit">Submit</button>
</form>
<hr />

<hr />
<strong>Alertas</strong>
<br />
<?php
// chama a função de exibição de alertas
require 'alertas.php'
?>

<hr />

<strong>Voltar a página inicial</strong>
<form action="./../index.php">
    <button type="submit">Voltar</button>
</form>
<hr />
