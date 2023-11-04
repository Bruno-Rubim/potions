<?php

include_once(__DIR__ . "/../model/Pocao.php");

class PocaoService{
    public function validarDados(Pocao $pocao){
        $erros = array();
        if(!$pocao->getAutor()){
            array_push($erros, "Autor não informado");
        }
        if(!$pocao->getEfeito()){
            array_push($erros, "Efeito não informado");
        }
        if(!$pocao->getIntensidade()){
            array_push($erros, "Intensidade não informada");
        }
        if(!$pocao->getCor()){
            array_push($erros, "Cor não informada");
        }
        if(!$pocao->getIngredientes()){
            array_push($erros, "Ingredientes não informados");
        }
        if(!$pocao->getReceita()){
            array_push($erros, "Receita não informada");
        }
        return $erros;
    }
}

?>