<?php
require_once 'conexao.php';

class MiniCursos
{

    /*
     * função para adicionar minicursos
     * @author brunoqualhato
     * @date 28/02/2018
     */
    function add($param)
    {
        try {
            $conexao = Conexao::getInstance();
            $stmt = $conexao->prepare("INSERT INTO `mini_cursos`(`nome_mini_curso`,data, `horario`, `palestrante`) VALUES (:nome,:data,:horario,:palestrante)");
            return $stmt->execute(array(
                ':nome' => $param['nome'],
                ':data' => $param['data'],
                ':horario' => $param['horario'],
                ':palestrante' => $param['palestrante']
            ));
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    /*
     * função para remover minicursos
     * @author brunoqualhato
     * @date 28/02/2018
     */
    function remover($id)
    {
        try {
            $conexao = Conexao::getInstance();
            $stmt = $conexao->prepare("DELETE FROM `mini_cursos` WHERE idcursos = '{$id}'");
            return $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    /*
     * função para editar minicursos
     * @author brunoqualhato
     * @date 28/02/2018
     */
    function atualizar($param)
    {
        try {
            $conexao = Conexao::getInstance();
            $stmt = $conexao->prepare("INSERT INTO `mini_cursos`(`nome_mini_curso`, `data`, `horario`, `palestrante`) VALUES (:mini_curso,:data,:horario,:palestrante)");
            return $stmt->execute(array(
                ':mini_curso' => $param['mini_curso'],
                ':data' => $param['data'],
                ':horario' => $param['horario'],
                ':palestrante' => $param['palestrante']
            ));
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    /*
     * função para retornar o numero de minicursos
     * @author brunoqualhato
     * @date 28/02/2018
     */
    function contar()
    {
        try {
            $conexao = Conexao::getInstance();
            $stmt = $conexao->prepare("SELECT * FROM `mini_cursos`");
            $stmt->execute();
            return $stmt->rowCount();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    /*
     * função para listar minicursos
     * @author brunoqualhato
     * @date 28/02/2018
     */
    function listar()
    {
        try {
            $conexao = Conexao::getInstance();
            $stmt = $conexao->prepare("SELECT * FROM `mini_cursos`");
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}

