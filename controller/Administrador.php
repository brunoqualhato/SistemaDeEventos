<?php
require_once 'conexao.php';

class Administrador
{
    
    /*
     * metodo para fazer logout
     * @author brunoqualhato
     * @date 28/02/2018
     */
    function logout()
    {
        try {
         session_destroy();
         header('Location: ../index.php');
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    
    /*
     * metodo para Logar os adms
     * @author brunoqualhato
     * @date 28/02/2018
     */
    function logar($param)
    {
        try {
            $conexao = Conexao::getInstance();

            $stmt = $conexao->prepare("SELECT * FROM `administrador` WHERE email = '{$param['login']}' AND senha = '{$param['senha']}'");

            $stmt->execute();
            return $stmt->rowCount();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    /*
     * metodo para adicionar novos adms
     * @author brunoqualhato
     * @date 28/02/2018
     */
    function add($param)
    {
        try {
            $conexao = Conexao::getInstance();

            $stmt = $conexao->prepare("INSERT INTO `administrador`(`email`, `senha`) VALUES (:email, :senha)");

            return $stmt->execute(array(
                ':email' => $param['login'],
                ':senha' => $param['senha']
            ));
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    /*
     * metodo para remover adms
     * @author brunoqualhato
     * @date 28/02/2018
     */
    function remover($id)
    {
        $conexao = Conexao::getInstance();
        $stmt = $conexao->prepare("DELETE FROM `administrador` WHERE idadministrador = {$id}");
        return $stmt->execute();
    }

    /*
     * metodo para editar novos adms
     * @author brunoqualhato
     * @date 28/02/2018
     */
    function editar($param)
    {
        $conexao = Conexao::getInstance();
        $stmt = $conexao->prepare("UPDATE `administrador` SET `email`= :email,`senha`=:senha WHERE idadministrador = :idadmin");
        return $stmt->execute(array(
            ':email' => $param['email'],
            ':senha' => $param['senha'],
            ':idadmin' => $param['idadmin']
        ));
    }

    /*
     * função para listar adms
     * @author brunoqualhato
     * @date 28/02/2018
     */
    function listar($param)
    {
        $conexao = Conexao::getInstance();
        $stmt = $conexao->prepare("SELECT * FROM `administrador`");
        $stmt->execute();
        return $stmt->fetchAll();
    }
}

?>