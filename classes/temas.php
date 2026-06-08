<?php

require_once 'fabrica_personagem.php';

class FabricaMedieval extends Fabrica {

     function getTema(): string {
        return "medieval";
    }

    function getTitulo(): string {
        return "Olá, sir";
    }

    function getSubtitulo(): string {
        return "Escolha seu aparato";
    }


    function getOpcoesArmas(): array {
        return ["Espada", "Arco e Flecha", "Cajado"];
    }

    public function getOpcoesArmaduras(): array {
        return ["Armadura", "Uniforme", "Pijama"];
    }

    public function getPersonagemImagemUrl(string $arma, string $armadura): string {
    if($arma == "Espada" && $armadura == "Armadura") return $this->pastaImagensEndereco."personagem_herói_medieval.png";
    else if($arma == "Espada" && $armadura == "Uniforme") return $this->pastaImagensEndereco."personagem_medieval_guarda_real.png";
    else if($arma == "Espada" && $armadura == "Pijama") return $this->pastaImagensEndereco."personagem_medieval_novato.png";
    else if($arma == "Arco e Flecha" && $armadura == "Armadura") return $this->pastaImagensEndereco."personagem_astuto_medieval.png";
    else if($arma == "Arco e Flecha" && $armadura == "Uniforme") return $this->pastaImagensEndereco."personagem_rebelde_medieval.png";
    else if($arma == "Arco e Flecha" && $armadura == "Pijama") return $this->pastaImagensEndereco."personagem_destemido_medieval.png";
    else if($arma == "Cajado" && $armadura == "Armadura") return $this->pastaImagensEndereco."personagem_mago_real.png";
    else if($arma == "Cajado" && $armadura == "Uniforme") return $this->pastaImagensEndereco."personagem_mago_estudante.png";
    else if($arma == "Cajado" && $armadura == "Pijama") return $this->pastaImagensEndereco."personagem_mago_do_sono.png";
    else return "";
    }
}

// implemente o Futurista e Steampunk...