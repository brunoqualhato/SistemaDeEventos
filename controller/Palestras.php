<?php
require_once 'conexao.php';

class Palestras
{

    /*
     * metodo para adicionar palestras
     * @author brunoqualhato
     * @date 28/02/2018
     */
    function add($param)
    {
        try {
            $conexao = Conexao::getInstance();
            
            $stmt = $conexao->prepare("INSERT INTO `palestras`(`nome_palestras`, `horario`, `data`, `palestrante`) VALUES (:nome,:horario,:data,:palestrante)");
            return $stmt->execute(array(
                ':nome' => $param['nome'],
                ':horario'=>$param['horario'],
                ':data' => $param['data'],
                ':palestrante'=> $param['palestrante']
            ));
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    /*
     * metodo para excluir palestras
     * @author brunoqualhato
     * @date 28/02/2018
     */ 
    function remover($id)
    {
        try {
            $conexao = Conexao::getInstance();
            $stmt = $conexao->prepare("DELETE FROM `palestras` WHERE idpalestras= '{$id}'");
            return $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    /*
     * metodo para editar palestras
     * @author brunoqualhato
     * @date 28/02/2018
     */
    function atualizar($param)
    {
        try {
            $conexao = Conexao::getInstance();
            $stmt = $conexao->prepare("UPDATE `palestras` SET `nome_palestras`= :nome,`horario`= :horario,`data`= :data,`palestrante`= :palestrante WHERE `idpalestras` = :idPalestra");
            $stmt->execute(array(
                ':nome' => $param['nome'],
                ':horario' => $param['horario'],
                ':data' =>$param['data'],
                ':palestrante' => $param['palestrante'],
                ':idPalestra' => $param[':idPalestra']
            ));
        } catch (PDOException $e) {
            
            echo $e->getMessage();
        }
    }

    /*
     * metodo para listar palestra
     * @author brunoqualhato
     * @date 28/02/2018
     */
    function listar()
    {
        try {
            $conexao = Conexao::getInstance();
            $stmt = $conexao->prepare("SELECT * FROM `palestras`");
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    /*
     * metodo para contar numero de palestras cadastradas
     * @author brunoqualhato
     * @date 28/02/2018
     */
    function contar($param)
    {
        try {
            $conexao = Conexao::getInstance();
            $stmt = $conexao->prepare("SELECT * FROM `palestras`");
            $stmt->execute();
            $stmt->rowCount();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}

