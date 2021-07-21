<?php
session_start();
include '../Config/conexao.php';

if(empty($_POST['email']) || empty($_POST['senha']) || empty($_POST['nome']) || empty($_POST['dt_nasc'])){
    $_SESSION['falha_update'] = true;
    header('Location: ../Views/painel.php');
    exit();
}

$usuario = mysqli_real_escape_string($mysqli, $_POST['email']);
$senha = mysqli_real_escape_string($mysqli, $_POST['senha']);
$nome = mysqli_real_escape_string($mysqli, $_POST['nome']);
$telefone = mysqli_real_escape_string($mysqli, $_POST['telefone']);
$dt_nasc = mysqli_real_escape_string($mysqli, $_POST['dt_nasc']);
$ID = mysqli_real_escape_string($mysqli, $_POST['ID']);

$query = "UPDATE `usuario` SET `email` = '{$usuario}', `senha` = '{$senha}', `nome` = '{$nome}', `telefone` = '{$telefone}', `dt_nasc` = '{$dt_nasc}' WHERE `usuario`.`ID` = {$ID}";

if(mysqli_query($mysqli, $query)){
    $_SESSION['sucesso_update'] = true;
    $_SESSION['email'] = $usuario;
    header('Location: ../Views/painel.php');
    exit();
}else{
    $_SESSION['falha_update'] = true;
    header('Location: ../Views/painel.php');
    exit();
}
?>
