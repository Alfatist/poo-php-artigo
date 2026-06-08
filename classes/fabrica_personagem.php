<?php

abstract class Fabrica{

  
  protected string $pastaImagensEndereco;

  public function __construct(string $pastaImagensEndereco) {
    $this->pastaImagensEndereco = $pastaImagensEndereco;
  }
  
  
  abstract function getTema():string;
  abstract function getTitulo():string;
  abstract function getSubtitulo():string;
  abstract function getOpcoesArmas():array;
  abstract function getOpcoesArmaduras():array;
  abstract function getPersonagemImagemUrl(string $arma, string $armadura):string;

}

?>