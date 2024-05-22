<?php
// inicia ou retoma uma seção - necessário para o recebimento de alertas
session_start();
?>

<strong>Backend toni veggie</strong>
<br />
<br />  

<div>
    <form action="/frontend/usuarios.php">
        <button type="submit">Usuários</submit>
    </form>
</div>

<div>
    <form action="/frontend/alimentos.php">
        <button type="submit">Alimentos</submit>
    </form>
</div>

<div>
    <form action="/frontend/receitasCadastro.php">
        <button type="submit">Cadastro Receita</submit>
    </form>
</div>

<hr />
<strong>Alertas</strong>
<br />
<?php
// chama a função de exibição de alertas
require './frontend/alertas.php'
?>
<hr />