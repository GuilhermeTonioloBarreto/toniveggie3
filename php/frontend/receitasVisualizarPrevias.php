<?php
// inicia ou retoma uma seção - necessário para o recebimento de alertas
session_start();

// invoca a leitura da prévia das receitas
require './../backend/receitasReadFunctions.php';
$receitasPrevia = receitasReadAllPreview($_SESSION['currentUserId']);

?>

<hr />
<strong>Visualizar Prévias das Receitas</strong>

<?php
foreach($receitasPrevia as $receita){
    echo "<br />";
    echo "Nome: " . $receita['nome'] . "<br />";
    echo "Descrição: " . $receita['descricao'];

    echo "<form action='./receitasVisualizarReceita.php' method='post'>";
    echo "<input type='hidden' name='receitaId' value='" . $receita['id']  . "' />";
    echo "<button type='submit'>Ver receita</button>";
    echo "</form>";
}
?>


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
