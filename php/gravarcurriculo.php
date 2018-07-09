<?php
include('nomes.php');
try {
    $nome = $_GET['Nome'];
    $nasc = $_GET['Nascimento'];
    $sexo = $_GET['Sexo'];
    $ender = $_GET['Ender'];
    $numero = $_GET['Numero'];
    $bairro = $_GET['Bairro'];
    $cidade = $_GET['Cidade'];
    $uf = $_GET['UF'];
    $cpf = $_GET['CPF'];
    $fone = $_GET['Fone'];
    $email = $_GET['EMail'];
    $escol = $_GET['Esco'];
    $pessoal = $_GET['Pessoal'];
    $prof = $_GET['Prof'];
    
    $query = "";
    $conn = mysqli_connect($servidor, $usuario, $senha, $esquema) or die("Erro: conexao-" . mysqli_error($conn));
    $query = "SELECT Id FROM dados WHERE (CPF = '" . trim($cpf) . "');";
    $result = mysqli_query($conn, $query) or die("Erro: consulta-" . mysqli_error($conn) . " - " . $query);
    if(mysqli_num_rows($result) < 1) {
        $query = "INSERT INTO dados (Id, Nome, Nascimento, Sexo, Endereco, Numero, Bairro, " . 
                 "Cidade, UF, CPF, Telefone, EMail, Escolaridade, RefPessoal, RefProfissional, " . 
                 "Senha) VALUES (0, '" . trim($nome) . "', '" . date("Y-m-d",strtotime($nasc)) . "', " .
                 "'" . trim($sexo) . "', '" . trim($ender) . "', '" . trim($numero) . "', '" .
                 trim($bairro) . "', '" . trim($cidade) . "', '" . trim($uf) . "', '" . trim($cpf) .
                 "', '" . trim($fone) . "', '" . trim($email) . "', '" . trim($escol) . "', '" .
                 trim($pessoal) . "', '" . trim($prof) . "','');";
    } else {
        $query = "UPDATE dados SET Nome = '" . trim($nome) . "', Nascimento = '" . date("Y-m-d",strtotime($nasc)) . "', " . 
                 "Sexo = '" . trim($sexo) . "', Endereco = '" . trim($ender) . "', " .
                 "Numero = '" . trim($numero) . "', Bairro = '" . trim($bairro) . "', Cidade = '" . trim($cidade) . 
                 "', UF = '" . trim($uf) . "', Telefone = '" . trim($fone) . "', " .
                 "EMail = '" . trim($email) . "', Escolaridade = '" . trim($escol) . "', RefPessoal = '" . trim($pessoal) . 
                 "', RefProfissional = '" . trim($prof) . "' WHERE (CPF = '" . trim($cpf) . "');";
    }
    mysqli_query($conn, $query) or die("Erro: Gravar-" . mysqli_error($conn) . " - " . $query);
    die("Registro Gravado com sucesso...");    
} catch (Exception $ex) {
    die("Erro: " . $ex->GetMessage());
}
?>