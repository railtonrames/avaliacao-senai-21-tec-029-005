<?php session_start() ?>

<!DOCTYPE html>
<!--
Trabalho - Formulário com tela de login em PHP e ligação com banco de dados MySQL
Entrega para quarta 28/07

Contextualização 

Construir um projeto de uma aplicação web completa contendo: Conexão com o banco mysql, front-end, já visto em UC anterior. 
A página deverá autenticar o usuário (tela de login) ter formulário que permita salvar, editar e excluir os dados de cadastro. 
O projeto será feito em duplas e deverá ser apresentado em dupla.
-->
<!doctype html>

<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Avaliação de Aprendizagem</title>
    
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
 
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    <!-- Custom styles for this template -->
    <link href="Assets/css/signin.css" rel="stylesheet" type="text/css"/>
  </head>
  <body class="text-center">
<main class="form-signin">
    <form action="Views/login.php" method="POST">
    <img class="mb-4" src="Assets/imgs/senai.png" alt="" width="300">
    <h1 class="h3 mb-3 fw-normal">Faça o login</h1>
    
    <?php if(isset($_SESSION['falha_autenticacao'])): ?>
    <div class="alert alert-danger" role="alert">
        Usuário ou senha inválidos.
    </div>
    <?php endif; unset($_SESSION['falha_autenticacao']);?>
    
    <?php if(isset($_SESSION['sucesso_insert'])): ?>
    <div class="alert alert-success" role="alert">
        Cadastro realizado com sucesso !
    </div>
    <?php endif; unset($_SESSION['sucesso_insert']);?>
    
    <?php if(isset($_SESSION['sucesso_delete'])): ?>
    <div class="alert alert-success" role="alert">
        Cadastro excluído com sucesso !
    </div>
    <?php endif; unset($_SESSION['sucesso_delete']);?>
    
        
    <div class="form-floating">
        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
      <label for="floatingInput">Email</label>
    </div>
    <div class="form-floating">
        <input type="password" class="form-control" id="floatingPassword" placeholder="Senha" name="senha">
      <label for="floatingPassword">Senha</label>
    </div>

    <div class="checkbox mb-3">
      
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Entrar</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2021</p>
    <a href="Views/cadastro.php">Cadastre-se</a>
  </form>
</main>  
  </body>
</html>
