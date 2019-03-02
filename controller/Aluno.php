<?php
require_once 'conexao.php';

class Aluno
{

    /*
     * metodo para adicionar alunos
     * @author brunoqualhato
     * @date 01/03/2018
     */
    function add($param)
    {
        try {
            $conexao = Conexao::getInstance();
            $stmt = $conexao->prepare("INSERT INTO `aluno`(`nome`, `matricula`, `periodo`, `cpf`, `email`, `cursos_idcursos`, `palestras_idpalestras`, `curso_idcurso`, `instituicao_idinstituição`)
                                                 VALUES (:nome,:matricula,:periodo,:cpf,:email,:mini_curso,:palestra,:curso,:instituicao)");
            return $stmt->execute(array(
                ':nome' => $param['nome'],
                ':matricula' => $param['matricula'],
                ':periodo' => $param['periodo'],
                ':cpf' => $param['cpf'],
                ':email' => $param['email'],
                ':mini_curso' => $param['mini_curso'],
                ':palestra' => $param['palestra'],
                ':curso' => $param['curso'],
                ':instituicao' => $param['instituicao']
            ));
        } catch (PDOException $e) {
            $e->getMessage();
            $e->getFile();
        }
    }

    /*
     * metodo para remover alunos
     * @author brunoqualhato
     * @date 01/03/2018
     */
    function remover($param)
    {
        try {
            $conexao = Conexao::getInstance();
            $stmt = $conexao->prepare("DELETE FROM `aluno` WHERE idaluno = {$param['id']}");
            return $stmt->execute();
        } catch (PDOException $e) {
            $e->getMessage();
            $e->getFile();
        }
    }

    /*
     * metodo para listar todos os alunos
     * @author brunoqualhato
     * @date 01/03/2018
     */
    function listarTodos()
    {
        try {
            $conexao = Conexao::getInstance();
            $stmt = $conexao->prepare("SELECT * FROM `aluno`");
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            $e->getMessage();
            $e->getFile();
        }
    }

    /*
     * metodo para listar alunos por curso
     * @author brunoqualhato
     * @date 01/03/2018
     */
    function listarPorCurso($param)
    {
        try {
            $conexao = Conexao::getInstance();
            $stmt = $conexao->prepare("SELECT * FROM `aluno` WHERE curso_idcurso = {$param['curso']}");
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            $e->getMessage();
            $e->getFile();
        }
    }

    /*
     * metodo para editar alunos
     * @author brunoqualhato
     * @date 01/03/2018
     */
    function editar($param)
    {
        try {
            $conexao = Conexao::getInstance();
            $stmt = $conexao->prepare("UPDATE `aluno` SET `nome`= :nome,`matricula`=:matricula,`periodo`= :periodo,`cpf`= :cpf,
                                    `email`= :email,`cursos_idcursos`= :mini_curso,`palestras_idpalestras`= :palestra,`curso_idcurso`= :curso,
                                    `instituicao_idinstituição`= :instituicao WHERE idaluno = :idaluno");
            return $stmt->execute(array(
                ':nome' => $param['nome'],
                ':matricula' => $param['matricula'],
                ':periodo' => $param['periodo'],
                ':cpf' => $param['cpf'],
                ':email' => $param['email'],
                ':mini_curso' => $param['mini_curso'],
                ':palestra' => $param['palestra'],
                ':curso' => $param['curso'],
                ':instituicao' => $param['instituicao'],
                ':idaluno' => $param['idaluno']
            ));
        } catch (PDOException $e) {
            $e->getMessage();
            $e->getFile();
        }
    }
}
