<?php

class Efeito {
    private ?int $id;
    private ?string $nome;
    private ?string $desc;

    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;

        return $this;
    }

    public function getNome(){
        return $this->nome;
    }
    public function setNome($nome){
        $this->nome = $nome;

        return $this;
    }

    public function getDesc(){
        return $this->desc;
    }
    public function setDesc($desc){
        $this->desc = $desc;

        return $this;
    }
}

?>