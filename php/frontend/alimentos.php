<?php
// inicia ou retoma uma seção - necessário para o recebimento de alertas
session_start();


// invoca a leitura das unidades de medida dos alimentos
require './../backend/unidadesDeMedidaReadFunctions.php';
$unidadesDeMedida = unidadesDeMedidaReadAll();

// invoca a leitura de todos os alimentos
require './../backend/alimentosReadFunctions.php';
$alimentos = alimentosReadAll($_SESSION['currentUserId']);
?>

<hr />
<strong>Cadastrar Alimento</strong>
<form action = "../backend/alimentosWriteForm.php" method="POST">

    <input type="hidden" name="usuarioId" value="<?php echo $_SESSION['currentUserId'] ?>" />

    <label>Nome do alimento: </label>
    <input type="text" name="alimentoNome" />
    <br />

    <label>Unidade de medida: </label>
    <select name="unidadeDeMedidaId">
        <?php
        foreach($unidadesDeMedida as $unidade){
            echo "<option value=" . $unidade['id'] . "> " . $unidade['nome'] . "</option>";
        }
        ?>
    </select>
    <br />

    <button type="submit">Submit</button>

</form>
<hr />

<hr />
<strong>Visualizar Alimentos</strong>

<table>
    <tr>
        <th>nome</th>
        <th>unidade</th>
        <th>alimento cadastrado pelo usuario</th>
    <tr>
    
    <?php
    foreach($alimentos as $alimento){
        echo "<tr>";
        echo "<td>" . $alimento['nome'] . "</td>";
        echo "<td>" . $alimento['unidade'] . "</td>";
        $registrouOAlimento = $alimento['usuarioId'] == '0' ? "não" : "sim";
        echo "<td>" . $registrouOAlimento . "</td>";
        echo "</tr>";
    }
    ?>
</table>
<hr />

<hr />
<strong>Atualizar Alimentos</strong>

<form action="/../backend/alimentosUpdateForm.php" method="post">
    <input type="hidden" name="usuarioId" value="<?php echo $_SESSION['currentUserId'] ?>" />

    <label>Alimento a ser modificado: </label>
    <select name="alimentoId">
        <?php
        foreach($alimentos as $alimento){
            echo "<option value=" . $alimento['id'] . "> " . $alimento['nome'] . "</option>";
        }
        ?>  
    </select>
    <br />

    <label>Novo nome do alimento: </label>
    <input type="text" name="alimentoNome" />
    <br />

    <label>Unidade de medida do novo alimento: </label>
    <select name="unidadeDeMedidaId">
        <?php
        foreach($unidadesDeMedida as $unidade){
            echo "<option value=" . $unidade['id'] . "> " . $unidade['nome'] . "</option>";
        }
        ?>
    </select>
    <br />

    <button type="submit">Submit</button>

</form>
<hr />


<hr />
<strong>Deletar Alimentos</strong>

<form action="/../backend/alimentosDeleteForm.php" method="post">
    <input type="hidden" name="usuarioId" value="<?php echo $_SESSION['currentUserId'] ?>" />

    <label>Alimento a ser Deletado: </label>
    <select name="alimentoId">
        <?php
        foreach($alimentos as $alimento){
            echo "<option value=" . $alimento['id'] . "> " . $alimento['nome'] . "</option>";
        }
        ?>  
    </select>
    <br />

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

<hr />
<strong>Voltar a página inicial</strong>
<form action="./../index.php">
    <button type="submit">Voltar</button>
</form>
<hr />
