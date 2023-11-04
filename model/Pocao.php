<?php
include_once(__DIR__ . "/Ingrediente.php");
include_once(__DIR__ . "/Cor.php");
include_once(__DIR__ . "/Efeito.php");

class Pocao {
    private ?int $id;
    private ?string $autor;
    private ?string $receita;
    private ?Efeito $efeito;
    private ?int $intensidade;
    private ?Cor $cor;
    private ?Array $ingredientes;

    public function __construct(){
        $this->id = 0;
        $this->efeito = null;
        $this->cor = null;
        $this->ingredientes = array();
    }

    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;

        return $this;
    }

    public function getEfeito(){
        return $this->efeito;
    }
    public function setEfeito($efeito){
        $this->efeito = $efeito;

        return $this;
    }

    public function getIntensidade(){
        return $this->intensidade;
    }
    public function setIntensidade($intensidade){
        $this->intensidade = $intensidade;

        return $this;
    }

    public function getReceita(){
        return $this->receita;
    }
    public function setReceita($receita){
        $this->receita = $receita;

        return $this;
    }

    public function getAutor(){
        return $this->autor;
    }
    public function setAutor($autor){
        $this->autor = $autor;

        return $this;
    }

    public function getIngredientes(){
        return $this->ingredientes;
    }
    public function setIngredientes($ingredientes){
        $this->ingredientes = $ingredientes;

        return $this;
    }

    public function getCor(){
        return $this->cor;
    }

    public function setCor($cor){
        $this->cor = $cor;

        return $this;
    }
}

?>