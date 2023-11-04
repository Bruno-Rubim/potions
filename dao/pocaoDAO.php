<?php

include_once(__DIR__ . "/../util/Connection.php");
include_once(__DIR__ . "/../model/Cor.php");
include_once(__DIR__ . "/../model/Efeito.php");
include_once(__DIR__ . "/../model/Ingrediente.php");
include_once(__DIR__ . "/../model/Pocao.php");

class PocaoDAO {
    private function getConn() {
        return Connection::getConnection();
    }
    public function list() {
        $conn = $this->getConn();
        $sql =
            "SELECT" .
                " p.*," .
                " e.id AS id_efeito," .
                " e.nome AS nome_efeito," .
                " e.descricao AS desc_efeito," .
                " c.id AS id_cor," .
                " c.nome AS nome_cor," .
                " c.imagem AS imagem_cor," .
                " i.id AS id_ing," .
                " i.nome AS nome_ing," .
                " i.imagem AS imagem_ing" .
            " FROM pocoes p" .
            " JOIN efeitos e ON p.id_efeito = e.id" .
            " JOIN cores c ON p.id_cor = c.id" .
            " JOIN ingredientes i ON p.id_ingrediente = i.id";
        $stm = $conn->prepare($sql);
        $stm->execute();
        $res = $stm->fetchAll();
        return $this->mapDBToObject($res);
    }

    public function insert(Pocao $pocao){
        $conn = Connection::getConnection();

        $sql = "INSERT INTO pocoes (autor, receita, id_efeito, intensidade, id_cor, id_ingrediente)".
        " VALUES (?, ?, ?, ?)";
        $stm = $conn->prepare($sql);
        $stm->execute(array($pocao->getAutor(), $pocao->getReceita(), $pocao->getEfeito()->getId(), $pocao->getIntensidade(), $pocao->getCor()->getId(),  $pocao->getIngredientes()[0]->getId())); //Check Ingrediente dps
    }

    public function update(Pocao $pocao){
        $conn = Connection::getConnection();

        $sql = "UPDATE pocoes SET autor = ?, receita = ?, id_efeito = ?, intensidade = ?, id_cor = ?, id_ingrediente = ?".
        " WHERE id = ?";
        $stm = $conn->prepare($sql);
        $stm->execute(array($pocao->getAutor(), $pocao->getReceita(), $pocao->getEfeito()->getId(), $pocao->getIntensidade(), $pocao->getCor()->getId(),  $pocao->getIngredientes()[0]->getId(), $pocao->getId()));
    }

    public function findById(int $idPocao){
        $conn = Connection::getConnection();
        $sql = 
            "SELECT" .
                " p.*," .
                " e.id AS id_efeito," .
                " e.nome AS nome_efeito," .
                " e.descricao AS desc_efeito," .
                " c.id AS id_cor," .
                " c.nome AS nome_cor," .
                " c.imagem AS imagem_cor," .
                " i.id AS id_ing," .
                " i.nome AS nome_ing," .
                " i.imagem AS imagem_ing" .
            " FROM pocoes p" .
            " JOIN efeitos e ON p.id_efeito = e.id" .
            " JOIN cores c ON p.id_cor = c.id" .
            " JOIN ingredientes i ON p.id_ingrediente = i.id" . 
                "WHERE p.id = ?" . 
                " ORDER BY p.Efeito ASC";
        $stm = $conn->prepare($sql);
        $stm->execute(array($idPocao));
        $result = $stm->fetchAll();
        $pococes = $this->mapDBToObject($result);
        if ($pococes) {
            return $pococes[0];
        } else {
            return NULL;
        }
    }

    public function deleteById(int $idPocao){
        $conn = Connection::getConnection();

        $sql = "DELETE FROM pocoes WHERE id = ?";
        $stm = $conn->prepare($sql);
        $stm->execute(array($idPocao));
    }

    private function mapDBToObject(array $res) {
        $arr = array();
        foreach ($res as $item) {
            $potion = new Pocao();
            $potion->setId($item['id']);
            $potion->setAutor($item['autor']);
            $potion->setReceita($item['receita']);

            $efeito = new Efeito();
            $efeito->setId($item['id_efeito']);
            $efeito->setNome($item['nome_efeito']);
            $efeito->setDesc($item['desc_efeito']);
            $potion->setEfeito($efeito);

            $potion->setIntensidade($item['intensidade']);

            $cor = new Cor();
            $cor->setId($item['id_cor']);
            $cor->setNome($item['nome_cor']);
            $cor->setImagem($item['imagem_cor']);
            $potion->setCor($cor);

            $ing = new Ingrediente();
            $ing->setId($item['id_ing']);
            $ing->setNome($item['nome_ing']);
            $ing->setImagem($item['imagem_ing']);
            $potion->setIngredientes([ $ing ]);

            array_push($arr, $potion);
            return $arr;
        }
    }
}

?>
