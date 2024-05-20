<?php
// inicia ou retoma uma seção - necessário para o recebimento de alertas
session_start();

// invoca a leitura de todos os alimentos
require './../backend/alimentosReadFunctions.php';
$alimentos = alimentosReadAll($_SESSION['currentUserId']);
 
?>

<hr />
<strong>Cadastrar Receita</strong>
<form action = "../backend/receitasWriteForm.php" method="POST">

    <input type="hidden" name="usuarioId" value="<?php echo $_SESSION['currentUserId'] ?>" />

    <label>Nome da receita: </label>
    <input type="text" name="receitaNome" />
    <br />

    <label>Descrição da receita: </label>
    <br />
    <textarea name="receitaDescricao" rows="4" cols="50"></textarea>
    <br />

    <label>Quantidade de porções: </label>
    <input type="number" name="receitaQuantidadeDePorcoes" />
    <br />
    <br />
    
    <label>Ingredientes</label>
    <br />

    <table>
        <tr>
            <th></th>
            <th>Quantidade</th>
            <th>Unidade de Medida</th>
            <th>Ingrediente</th>
        </tr>
    <?php
    for($i = 1; $i <= 30; $i++){
        echo "<tr>";
        
        echo "<td>";
        echo "$i";
        echo "</td>";

        echo "<td>";
        echo "<input type='number' name='ingredienteQuantidade$i' />";
        echo "</td>";

        echo "<td>";
        echo "</td>";

        echo "<td>";
        echo "<select name='ingrediente$i'>"; 
        foreach($alimentos as $alimento){
            echo "<option value=" . $alimento['id'] . "> " . $alimento['nome'] . "</option>";
        } 
        echo "</select>";
        echo "</td>";
    }
    ?>
    </table>
    <br />
    
    <label>Preparo:</label>
    <br />
    <textarea name="receitaPreparo" rows="10" cols="100"></textarea>
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
