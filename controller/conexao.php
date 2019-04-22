<?php

class Conexao
{

    private static $conexao;

    private function __construct()
    {
    }

    
    /*
     * metódo realizar a conexão ao banco de dados
     * @author brunoqualhato
     */
    public static function getInstance()
    {
        if (is_null(self::$conexao)) {
            //alterar a senha e o usuario conforme necessario
            self::$conexao = new \PDO('mysql:host=localhost;port=3306;dbname=ifgcc_semana_academica', 'root', '1',
                                      array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            self::$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$conexao->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);
        }
        return self::$conexao;
    }

    /*
     * metódo para verificar se há sessao iniciada
     * @author brunoqualhato
     */
    public static function sessao()
    {
        if (!isset($_SESSION['login'])) {
            
            header('Location: ../index.php');
          
        }
    }
}

?>
