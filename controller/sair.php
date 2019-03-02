<?php
session_start();
require_once 'Administrador.php';
$sair = new Administrador();
$sair->logout();
?>