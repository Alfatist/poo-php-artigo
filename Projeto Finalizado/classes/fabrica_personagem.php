<?php

abstract class Fabrica{

  protected string $pastaImagensEndereco;

  public function __construct(string $pastaImagensEndereco) {
    $this->pastaImagensEndereco = $pastaImagensEndereco;
  }
  
  abstract public function getTema();
  abstract public function getTitulo();
  abstract public function getSubtitulo();
  abstract public function getOpcoesArmas();
  abstract public function getOpcoesArmaduras();
  abstract public function getPersonagemImagemUrl(string $arma, string $armadura);

}

?>