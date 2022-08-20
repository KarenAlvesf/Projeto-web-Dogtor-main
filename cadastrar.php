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
            <h2>Seja bem vindo Giovani</h2>
            <h3>Menu</h3>
        </div>
        <div class="d-grid gap-2 d-md-flex justify-content-md-center">
        <a class="btn btn-success button1" href="menu.php" type="button">Página Principal</a>
            <a class="btn btn-success button1" href="cadastrar.php" type="button">Cadastrar Agendamento</a>
            <a class="btn btn-success button1" href="consultar.php" type="button">Consultar Agendamento por nome</a>
            <a class="btn btn-success button1" href="consultardata.php" type="button">Consultar Agendamento por data</a>
            <a class="btn btn-success button1" href="funcoes/sair.php" type="button">Fazer Logout</a>
          </div>
          <hr>
        <div class="form">
            <h3 style="text-align:center;">Novo agendamento</h3>
            <form class="register-form" method="POST" action="">
              <input type="text" name="nome" placeholder="Nome" requerid/>
              <input type="text" name="tipo" placeholder="Tipo do animal" requerid/>
              <label for="label">Horário de início</label>
              <input type="time" name="horario_en"  placeholder="Horário do ínicio" requerid/>
              <label for="label">Horário de termino</label>
              <input type="time" name="horario_sa"  placeholder="Horário do termino" requerid/>
              <label for="label">Data:</label>
              <input type="date" name="data"  placeholder="Dia do agendamento" requerid/>
              <button type="subimit" name="agendarconsulta">Agendar</button>
            </form>
        </div>

    </div>
    <!-- partial -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

<!-- CADASTRAR CONSULTA -->
    
  <?php 
    if(isset($_POST['agendarconsulta'])){

     /*PEGAR DADOS DO CAMPO VIA POST*/  
      $tipo = mysqli_real_escape_string($conexao, $_POST['tipo']);
      $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
      $horario_entrada = mysqli_real_escape_string($conexao, $_POST['horario_en']);
      $horario_saida = mysqli_real_escape_string($conexao, $_POST['horario_sa']);
      $data = mysqli_real_escape_string($conexao, $_POST['data']);

      /*PEGAR A HORA E AJEITAR PRA HORA:MINUTO:SEGUNDOS*/  
      $horario_entrada = $horario_entrada.":00";
      $horario_saida= $horario_saida.":00";


      /*INSERT NA TABELA DO BDS*/ 
      $query = "INSERT INTO agenda  ( tipo, nome, entrada,saida, dia) VALUES ( '$tipo', '$nome', '$horario_entrada', '$horario_saida','$data')";
      $result = mysqli_query($conexao, $query);

      /*VERIFICAR SE A CONEXÃO FOI UM SUCESSO*/
      if($result == ''){
          echo "<script language='javascript'>window.alert('Erro ao cadastrar agendamento!'); </script>";
          echo "<script language='javascript'>window.location='menu.php'; </script>";
      }else{
          echo "<script language='javascript'>window.alert('Agendamento cadastrado com sucesso!'); </script>";
          echo "<script language='javascript'>window.location='menu.php'; </script>";
      }

     

    } ?>

</body>

</html>

<?php }else{ echo "<script language='javascript'>window.alert('SEM PERMISSÃO!'); </script>"; echo "<script language='javascript'>window.location='index.php'; </script>";} ?>