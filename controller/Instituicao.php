<?php
require_once 'conexao.php';

class Instituicao
{

    /*
     * metodo para adicionar instituições
     * @author brunoqualhato
     * @date 01/03/2018
     */
    function add($param)
    {
        try {
            $conexao = Conexao::getInstance();
            $stmt = $conexao->prepare("INSERT INTO `instituicao`(`nome_instituicao`, `cidade`) VALUES (:nome,:cidade)");
            return $stmt->execute(array(
                ':nome' => $param['nome'],
                ':cidade' => $param['cidade']
            ));
        } catch (PDOException $e) {
            $e->getMessage();
            $e->getFile();
        }
    }

    /*
     * metodo para remover instituições
     * @author brunoqualhato
     * @date 01/03/2018
     */
    function remover($param)
    {
        try {
            $conexao = Conexao::getInstance();
            $stmt = $conexao->prepare("DELETE FROM `instituicao` WHERE idinstituição = {$param['id']}");
            return $stmt->execute();
        } catch (PDOException $e) {
            $e->getMessage();
            $e->getFile();
        }
    }

    /*
     * metodo para editar instituições
     * @author brunoqualhato
     * @date 01/03/2018
     */
    function editar($param)
    {
        try {
            $conexao = Conexao::getInstance();
            $stmt = $conexao->prepare("UPDATE `instituicao` SET `nome_instituicao`= :nome,`cidade`= :cidade WHERE idinstituição = :idInsti");
            $stmt->execute(array(
                ':nome' => $param['nome'],
                ':cidade' => $param['cidade'],
                ':idInsti' => $param['id']
            ));
        } catch (PDOException $e) {
            $e->getMessage();
            $e->getFile();
        }
    }

    /*
     * metodo para listar instituições
     * @author brunoqualhato
     * @date 01/03/2018
     */
    function listar()
    {
        try {
            $conexao = Conexao::getInstance();
            $stmt = $conexao->prepare("SELECT * FROM `instituicao` ");
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            $e->getMessage();
            $e->getFile();
        }
    }

    /*
     * metodo para contar instituições
     * @author brunoqualhato
     * @date 01/03/2018
     */
    function contar()
    {
        try {
            $conexao = Conexao::getInstance();
            $stmt = $conexao->prepare("SELECT * FROM `instituicao` ");
            $stmt->execute();
            return $stmt->rowCount();
        } catch (PDOException $e) {
            $e->getMessage();
            $e->getFile();
        }
    }
}

