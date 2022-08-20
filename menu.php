<?php  include_once('conexao.php');session_start(); 
if(@$_SESSION['nivel'] == '1'){ ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Bem Vindo a Dogtor - Menu</title>
  <link rel="stylesheet" href="styleprin.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
    crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>

    <!-- partial:index.partial.html -->
    <div class="container p-3 mb-3" style="margin-top: 10vh;">
        <div class="col-12 tituloprin">
            <img src="https://vetus.com.br/universidade/wp-content/uploads/2020/03/veterinary.png">
            <h2>Seja bem vindo <?php echo $_SESSION['session_nome'] ?> </h2>
            <h3>Menu</h3>
        </div>
        
        <div class="d-grid gap-2 d-md-flex justify-content-md-center">
            <a class="btn btn-success button1" href="menu.php" type="button">Página Principal</a>
            <a class="btn btn-success button1" href="cadastrar.php" type="button">Cadastrar Agendamento</a>
            <a class="btn btn-success button1" href="consultar.php" type="button">Consultar Agendamento por nome</a>
            <a class="btn btn-success button1" href="consultardata.php" type="button">Consultar Agendamento por data</a>
            <a class="btn btn-success button1" href="funcoes/sair.php" type="button">Fazer Logout</a>
          </div>
       
    </div>
    <!-- partial -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

</body>

</html>

<?php }else{ echo "<script language='javascript'>window.alert('SEM PERMISSÃO!'); </script>"; echo "<script language='javascript'>window.location='index.php'; </script>";} ?>