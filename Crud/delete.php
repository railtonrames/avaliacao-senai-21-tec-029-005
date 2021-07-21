<?php
session_start();
include '../Config/conexao.php';

$ID = mysqli_real_escape_string($mysqli, $_POST['ID']);

$query = "DELETE FROM `usuario` WHERE `usuario`.`ID` = {$ID}";

try {
    if(mysqli_query($mysqli, $query)){
        $_SESSION['sucesso_delete'] = true;
        header('Location: ../index.php');
        exit();
    }
} catch (Exception $exc) {
    echo $exc->getTraceAsString();
}
