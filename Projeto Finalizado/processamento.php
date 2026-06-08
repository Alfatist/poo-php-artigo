<?php 

$ehParaExibirPersonagem = isset($_POST['arma']) && isset($_POST['armadura']);

$temaEscolhido = $_POST['tema'];

$fabrica = null;

switch ($temaEscolhido) {
  case 'medieval':
    $fabrica = new FabricaMedieval("/imagens/");
    break;
  
  default:
    echo "<script>
                alert('Desculpe, tema não implementado ainda.');
                window.history.back();
              </script>";
    exit;
    break;
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Criação - <?=$fabrica->getTema()?> </title>

  <link rel="stylesheet" href="./style.css">
</head>

<body>



  <div class="container">
    <h1><?=$fabrica->getTitulo()?></h1>

    <?php if (!$ehParaExibirPersonagem): ?>
    <h2><?=$fabrica->getSubtitulo()?></h2>

    <form action="#" method="POST">
      <input type="hidden" type="text" name="tema" value="<?=$_POST['tema']?>">

      <div class="selector">
        <h3>Arma</h3>
        <div class="control">
          <div class="arrow" onclick="changeOption('arma', -1)">⬅</div>
          <div class="value" id="arma"></div>
          <div class="arrow" onclick="changeOption('arma', 1)">➡</div>
        </div>
        <input type="hidden" name="arma" id="input-arma" value="">
      </div>

      <div class="selector">
        <h3>Armadura</h3>
        <div class="control">
          <div class="arrow" onclick="changeOption('armadura', -1)">⬅</div>
          <div class="value" id="armadura"></div>
          <div class="arrow" onclick="changeOption('armadura', 1)">➡</div>
        </div>
        <input type="hidden" name="armadura" id="input-armadura" value="">
      </div>

      <button class="submit-btn" onclick="back()">Submeter</button>

    </form>
    <?php else: ?>
    <h2>Aqui está seu personagem:</h2>

    <img style="width: 100%;" src="<?=$fabrica->getPersonagemImagemUrl($_POST['arma'], $_POST['armadura'])?>"
      alt="Personagem criado">

    <i><small>Atenção: imagens geradas em IA, com o prompt: 'Crie um personagem destemido, que usa <b>Arma</b> e vista
        um
        <b>Armadura</b>. Deve ser estilo <b>Tema</b>. Faça estilo cartoon.'</small></i>

    <button type="submit" class="submit-btn" onclick="window.location.href='index.html'">Criar outro</button>
    <?php endif; ?>
  </div>

  <script>
  const opcoesPersonagemAtributos = {
    arma: <?= json_encode($fabrica->getOpcoesArmas()) ?>,
    armadura: <?= json_encode($fabrica->getOpcoesArmaduras()) ?>
  };

  const indice = {
    caracteristica: 0,
    arma: 0,
    armadura: 0
  };

  function changeOption(tipo, direcao_inteiro) {
    indice[tipo] += direcao_inteiro;

    if (indice[tipo] < 0) {
      indice[tipo] = opcoesPersonagemAtributos[tipo].length - 1;
    }

    if (indice[tipo] >= opcoesPersonagemAtributos[tipo].length) {
      indice[tipo] = 0;
    }

    const novoAtributo = opcoesPersonagemAtributos[tipo][indice[tipo]];

    document.getElementById(tipo).innerText = novoAtributo;
    document.getElementById("input-" + tipo).value = novoAtributo;
  }
  changeOption('arma', 0);
  changeOption('armadura', 0);
  </script>

</body>

</html>