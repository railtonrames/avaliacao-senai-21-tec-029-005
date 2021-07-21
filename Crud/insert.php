<?php
session_start();
include '../Config/conexao.php';

if(empty($_POST['email']) || empty($_POST['senha']) || empty($_POST['nome']) || empty($_POST['dt_nasc'])){
    $_SESSION['falha_insert'] = true;
    header('Location: ../Views/cadastro.php');
    exit();
}

$usuario = mysqli_real_escape_string($mysqli, $_POST['email']);
$senha = mysqli_real_escape_string($mysqli, $_POST['senha']);
$nome = mysqli_real_escape_string($mysqli, $_POST['nome']);
$telefone = mysqli_real_escape_string($mysqli, $_POST['telefone']);
$dt_nasc = mysqli_real_escape_string($mysqli, $_POST['dt_nasc']);

$query_select = "select * from usuario where email = '{$usuario}'";
$result = mysqli_query($mysqli, $query_select);
$row = mysqli_num_rows($result);

if($row == 1){
    $_SESSION['falha_email'] = true;
    header('Location: ../Views/cadastro.php');
    exit();
}

$query = "INSERT INTO usuario (ID, email, senha, nome, telefone, dt_nasc) VALUES (NULL, '{$usuario}', '{$senha}', '{$nome}', '{$telefone}', '{$dt_nasc}');";

if(mysqli_query($mysqli, $query)){
    $_SESSION['sucesso_insert'] = true;
    header('Location: ../index.php');
    exit();
}else{
    $_SESSION['falha_insert'] = true;
    header('Location: ../Views/cadastro.php');
    exit();
}
?>
