<?php session_start(); ?>
<html>
    <head>
        <title>Cadastrar</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <link rel="shortcut icon" href="../favicon-32x32.png"/>      
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <link href="../Assets/css/cadastro.css" rel="stylesheet" type="text/css"/>
        
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
    </head>
    <body>
        <form class="form-cadastro row g-3" action="../Crud/insert.php" method="POST">
            <div class="col-12">
                <h1 class="h3 mb-3 fw-normal alert alert-dark">Realize o cadastro</h1>
            </div>
            
            <?php if(isset($_SESSION['falha_insert'])): ?>
            
            <div class="col-12">
                <div class="alert alert-danger" role="alert">
                    Preencha todos os campos obrigatórios !
                </div>
            </div>
            
            <?php endif; unset($_SESSION['falha_insert']);?>
            
            <?php if(isset($_SESSION['falha_email'])): ?>
            
            <div class="col-12">
                <div class="alert alert-danger" role="alert">
                    E-mail já cadastrado !
                </div>
            </div>
            
            <?php endif; unset($_SESSION['falha_email']);?>
            
            <div class="col-12">
              <label for="inputNome" class="form-label">*Nome</label>
              <input type="text" class="form-control" id="inputNome" name="nome">
            </div>
            <div class="col-md-7">
              <label for="inputEmail" class="form-label">*Email</label>
              <input type="email" class="form-control" id="inputEmail" name="email">
            </div>
            <div class="col-md-5">
              <label for="inputSenha" class="form-label">*Senha</label>
              <input type="password" class="form-control" id="inputSenha" name="senha">
            </div>

            <div class="col-md-7">
              <label for="inputTelefone" class="form-label">Telefone</label>
              <input type="tel" class="form-control" id="inputTelefone" name="telefone">
            </div>
            <div class="col-md-5">
              <label for="inputData" class="form-label">*Data de Nascimento</label>
              <input type="date" class="form-control" id="inputData" name="dt_nasc">
            </div>  
            <div class="col-12">
              <button type="submit" class="btn btn-primary">Cadastrar</button>
              <a type="submit" class="btn btn-outline-dark" href="../index.php" style="float: right">Voltar</a>
            </div>
        </form>
    </body>
</html>