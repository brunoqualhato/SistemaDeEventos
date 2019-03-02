<?php
require_once 'conexao.php';

class Turmas
{

    
    /*
     * função para cadastrar curso
     * @author brunoqualhato
     * @date 28/02/2018
     */
    function add($param)
    {
        try {
            $conexao = Conexao::getInstance();
            $stmt = $conexao->prepare("INSERT INTO `curso`(`nome_curso`) VALUES (:nome)");
            return $stmt->execute(array(
                ':nome' => $param['curso']
            ));
        } catch (PDOException $e) {
            echo $e->getMessage();
            echo $e->getLine();
        }
    }

    
    /*
     * função para remover o curso
     * @author brunoqualhato
     * @date 28/02/2018
     */
    function remover($id)
    {
        try {
            $conexao = Conexao::getInstance();
            $stmt = $conexao->prepare("DELETE FROM `curso` WHERE idcurso = {$id}");
            return $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
            echo $e->getLine();
        }
    }

    
    /*
     * função para editar o curso
     * @author brunoqualhato
     * @date 28/02/2018
     */
    function atualizar($param)
    {
        try {
            $conexao = Conexao::getInstance();
            $stmt = $conexao->prepare("UPDATE `curso` SET nome_curso`= :nome WHERE idcurso = :idCurso");
            return $stmt->execute(array(
                ':nome' => $param['nome'],
                ':idCurso' => $param['id']
            ));
        } catch (PDOException $e) {
            echo $e->getMessage();
            echo $e->getLine();
        }
    }

    
    /*
     * função para listar cursos cadastrados
     * @author brunoqualhato
     * @date 28/02/2018
     */
    function listar()
    {
        try {
            $conexao = Conexao::getInstance();
            $stmt = $conexao->prepare("SELECT * FROM `curso`");
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
            echo $e->getLine();
        }
    }
    
    
    /*
     * função para contar cursos cadastrados
     * @author brunoqualhato
     * @date 28/02/2018
     */
    function contarCursos() {
        try {
            $conexao = Conexao::getInstance();
            $stmt = $conexao->prepare("SELECT * FROM `curso`");
            $stmt->execute();
            return $stmt->rowCount();
        } catch (PDOException $e) {
            echo $e->getMessage();
            echo $e->getLine();
        }
    }
}

