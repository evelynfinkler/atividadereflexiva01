<?php
include('nomes.php');
try {
    $conn = mysqli_connect($servidor, $usuario, $senha) or die("Erro: conexao-" . mysqli_error($conn));
    
    $query = "CREATE DATABASE IF NOT EXISTS curriculo;";
    mysqli_query($conn,$query) or die("Erro: " . mysqli_error($conn) . ".");
    
    $conn = mysqli_connect($servidor, $usuario, $senha, $esquema) or die("Erro: conexao-" . mysqli_error($conn));
    
    $query = "CREATE TABLE IF NOT EXISTS `dados` (`Id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT," .
    "`Nome` VARCHAR(60) NOT NULL,`Nascimento` DATETIME,`Sexo` VARCHAR(1)," .
    "`Endereco` VARCHAR(60),`Numero` VARCHAR(10),`Bairro` VARCHAR(45)," .
    "`Cidade` VARCHAR(60),`UF` VARCHAR(2),`CPF` VARCHAR(11),`Telefone` VARCHAR(20)," .
    "`EMail` VARCHAR(80),`Escolaridade` MEDIUMTEXT,`RefPessoal` MEDIUMTEXT," .
    "`RefProfissional` MEDIUMTEXT,`Senha` VARCHAR(40),PRIMARY KEY (`Id`)) ENGINE = InnoDB;";
    mysqli_query($conn,$query) or die("Erro: " . mysqli_error($conn) . ".");
    
    die("Banco de Dados criado...");
} catch (Exception $ex) {
    die("Erro: " . $ex->GetMessage());
}
?>