<?php

include_once(__DIR__ . "/../dao/pocaoDAO.php");
include_once(__DIR__ . "/../model/Pocao.php");
include_once(__DIR__ . "/../service/PocaoService.php");

class PocaoController {
    private PocaoDAO $pocaoDAO; 
    private PocaoService $pocaoService; 
    
    public function __construct(){
        $this->pocaoDAO = new PocaoDAO();
        $this->pocaoService = new PocaoService();
    }
    
    public function listar(){
        return $this->pocaoDAO->list();
    }
    
    public function inserir(Pocao $pocao){
        $errors = $this->pocaoService->validarDados($pocao);
        if ($errors){
            return $errors;
        }
        $this->pocaoDAO->insert($pocao);
        return array();
    }
    
    public function alterar(Pocao $pocao){
        $errors = $this->pocaoService->validarDados($pocao);
        if ($errors){
            return $errors;
        } 
        $this->pocaoDAO->update($pocao);
        return array();
    }
    
    public function buscarPorId(int $idPocao){
        return $this->pocaoDAO->findById($idPocao);
    }
    
    public function excluirPorId(int $idPocao){
        $this->pocaoDAO->deleteById($idPocao);
    }
}
?>