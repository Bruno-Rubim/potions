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
