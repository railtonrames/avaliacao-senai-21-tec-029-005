<?php
include('verifica_login.php');
include '../Config/conexao.php';


$usuario = $_SESSION['email'];

$query_select = "select * from usuario where email = '{$usuario}'";
$result = mysqli_query($mysqli, $query_select);
$dados = mysqli_fetch_assoc($result);
$row = mysqli_num_rows($result);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Painel do Usuário</title>  
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="../favicon-32x32.png"/>      
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <link href="../Assets/css/painel.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
        
        <style>
            .bd-placeholder-img {
              font-size: 1.125rem;
              text-anchor: middle;
              -webkit-user-select: none;
              -moz-user-select: none;
              user-select: none;
            }

            @media (max-width: 768px) {
              .bd-placeholder-img-lg {
                font-size: 3.5rem;
              }
              #spanDelete{
                  font-size: 0;
              }
            }
          </style>
</head>
<body>
    <form class="form-cadastro row g-3" action="../Crud/update.php" method="POST">
        
        <h2>Olá, <?php echo $dados['nome']?></h2>
        
        <div class="col-12">
            <h1 class="h3 mb-3 fw-normal alert alert-dark">Dados cadastrados</h1>
        </div>

        <?php if(isset($_SESSION['falha_update'])): ?>
        <div class="col-12">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Preencha todos os campos obrigatórios / E-mail já cadastrado !
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
        <?php endif; unset($_SESSION['falha_update']);?>
        
        <?php if(isset($_SESSION['sucesso_update'])): ?>
        <div class="col-12">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Cadastro alterado com sucesso !
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
        <?php endif; unset($_SESSION['sucesso_update']);?>

        <div class="col-12">
          <label for="inputNome" class="form-label">*Nome</label>
          <input value="<?php echo $dados['nome']?>" type="text" class="form-control" id="inputNome" name="nome">
        </div>
        <div class="col-md-7">
          <label for="inputEmail" class="form-label">*Email</label>
          <input value="<?php echo $dados['email']?>" type="email" class="form-control" id="inputEmail" name="email">
        </div>
        <div class="col-md-5">
          <label for="inputSenha" class="form-label">*Senha</label>
          <input value="<?php echo $dados['senha']?>" type="password" class="form-control" id="inputSenha" name="senha">
        </div>

        <div class="col-md-7">
          <label for="inputTelefone" class="form-label">Telefone</label>
          <input value="<?php echo $dados['telefone']?>" type="tel" class="form-control" id="inputTelefone" name="telefone">
        </div>
        <div class="col-md-5">
          <label for="inputData" class="form-label">*Data de Nascimento</label>
          <input value="<?php echo $dados['dt_nasc']?>" type="date" class="form-control" id="inputData" name="dt_nasc">
        </div> 
        
        <div>
            <input style="display: none"  value="<?php echo $dados['ID']?>" type="number" readonly  name="ID" >
        </div>
        
        <div class="col-12">
          <button type="submit" class="btn btn-primary">Editar</button>
          <a class="btn btn-outline-danger" style="float:right" href="logout.php">Sair</a>
        </div>
    </form>
    
    <form action="../Crud/delete.php" method="POST">
        <div>
            <input style="display: none" value="<?php echo $dados['ID']?>" type="number" readonly  name="ID" >
        </div>
        <button class="fas fa-trash btn btn-danger fa-3x" onclick="return confirm('Tem certeza que deseja deletar este registro?')" type="submit" style="padding: 15px"><span id="spanDelete">&nbsp;Excluir</span></button>
    </form>

</body>
</html>