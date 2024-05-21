<?php
/* 
Este formulário registra o alimento no sistema

parâmetros de entrada
  usuarioId
  receitaNome
  receitaDescricao
  receitaQuantidadeDePorcoes
  receitaPreparo
  ingredientesQuantidades
  ingredientesId

*/

// inicia ou retoma uma seção - necessário para o recebimento de alertas
session_start();

// Pegar constantes do database
require 'databaseConstants.php';

// checar dados recebidos do post
require 'databaseCheckPost.php';

// checar e resgatar dados recebidos do post
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $usuarioId = checar_dados_post($_POST["usuarioId"]);
  $receitaNome = checar_dados_post($_POST["receitaNome"]);
  $receitaDescricao = checar_dados_post($_POST["receitaDescricao"]);
  $receitaQuantidadeDePorcoes = checar_dados_post($_POST["receitaQuantidadeDePorcoes"]);
  $receitaPreparo = checar_dados_post($_POST["receitaPreparo"]);

  // checar array de quantidades
  $q =checar_dados_post_array($_POST["ingredientesQuantidades"]);
  $i =checar_dados_post_array($_POST["ingredientesId"]);
}

// conectar ao banco de dados
$conn = new mysqli(SERVERNAME, USERNAME, PASSWORD, DBNAME);

// Checar conexão
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}




// condição 1 para a receita não ser cadastrada: 
// algum campo descritivo da receita estiver vazio
$condicao1 = strlen($receitaNome) == 0 || strlen($receitaDescricao) == 0 || 
    strlen($receitaQuantidadeDePorcoes) || strlen($receitaPreparo) == 0;

if($condicao1){
  $_SESSION['alertaStatus'] = "2";
  $_SESSION['alertaMensagem'] = "Preencher corretamente nome / descrição 
    / quantidade de porções / preparo";
}

// condição 2 para a receita não ser cadastrada:
// todos os campo de ingredientesQuantidades for menor ou igual a 0
$condicao2 = 0;
foreach($q as $qnt){
    if ($qnt > 0){
        $condicao2++;
    }
}
if($condicao2 == 0){
    $condicao2 = true;
    $_SESSION['alertaStatus'] = "2";
    $_SESSION['alertaMensagem'] = "Nenhuma quantidade de ingredientes foi inserida";
} else {
    $condicao2 = false;
}

// condição 3 para a receita não ser cadastrada:
// todos os campo de ingredientesId são igual a 0 (nulo)
$condicao3 = 0;
foreach($i as $ing){
    if ($ing > 0){
        $condicao3++;
    }
}
if($condicao3 == 0){
    $condicao3 = true;
    $_SESSION['alertaStatus'] = "2";
    $_SESSION['alertaMensagem'] = "Nenhum ingrediente foi selecionado";
} else {
    $condicao3 = false;
}

// se nenhuma das condições foram alcançadas para não cadastrar o produto
// o produto pode ser cadastrado 
if(!$condicao1 and !$condicao2 and !$condicao3){
  //$insert = "
  //  INSERT INTO `alimentos`(`nome`, `unidadeDeMedidaId`, `usuarioId`) VALUES
  //  ('$alimentoNome', '$unidadeDeMedidaId', '$usuarioId')
  //";

  /* 
  $insert = "
    INSERT INTO `receitas`(`usuarioId`, `nome`, `descricao`, `quantidadeDePorcoes`, 
    `i1`, `i2`, `i3`, `i4`, `i5`, 
    `i6`, `i7`, `i8`, `i9`, `i10`, 
    `i11`, `i12`, `i13`, `i14`, `i15`, 
    `i16`, `i17`, `i18`, `i19`, `i20`, 
    `i21`, `i22`, `i23`, `i24`, `i25`, 
    `i26`, `i27`, `i28`, `i29`, `i30`, 
    `q1`, `q2`, `q3`, `q4`, `q5`, `q6`, `q7`, `q8`, `q9`, `q10`, 
    `q11`, `q12`, `q13`, `q14`, `q15`, `q16`, `q17`, `q18`, `q19`, `q20`, 
    `q21`, `q22`, `q23`, `q24`, `q25`, `q26`, `q27`, `q28`, `q29`, `q30`, 
    `preparo`) VALUES 
    ('$usuarioId','$receitaNome','$receitaDescricao','$receitaQuantidadeDePorcoes',
    '$i[0]', '$i[1]', '$i[2]', '$i[3]', '$i[4]',
    '$i[5]', '$i[6]', '$i[7]', '$i[8]', '$i[9]', 
    
    
    

  $result = $conn->query($insert);

  if ($result === TRUE) {
    $_SESSION['alertaStatus'] = "1";
    $_SESSION['alertaMensagem'] = "A gravação do alimento deu certo" ;

  } else {
    $_SESSION['alertaStatus'] = "2";
    $_SESSION['alertaMensagem'] = $conn->error; ;    
  }
}
*/
$conn->close();
header('Location: ./../frontend/alimentos.php');
exit;

?>