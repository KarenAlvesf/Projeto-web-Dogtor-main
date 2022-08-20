<?php include_once('conexao.php');session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Bem Vindo a Dogtor</title>
  <link rel="stylesheet" href="login/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="login/2hb.css">

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

  <nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img src="/icon/clipboard-pulse.svg" alt="" width="30" height="24" class="d-inline-block align-text-top">
        Clinica Dogtor - Bem vindo(a)
      </a>
    </div>
  </nav>

  <!-- partial:index.partial.html -->
  <div class="login-page">
    <div class="form">
      
      <!-- FORMULÁRIO DE REGISTRO -->
      <form class="register-form" method="POST" action="">
        <input type="text" name="nome" placeholder="Nome" />
        <input type="password" name="senha" placeholder="Senha" />
        <input type="text" name="email" placeholder="Endereço de email" />
        <button type="subimit" name="criar_usuario">Criar</button>
        <p class="message">Já está registrado? <a href="index.php">Fazer login</a></p>
      </form>

      <!-- FORMULÁRIO DE LOGIN -->
      <form class="login-form" method="POST" action="funcoes/verificar_login.php">
        <input type="text" name="email" placeholder="email" />
        <input type="password" name="senha" placeholder="Senha" />
        <button type="subimit">login</button>
        <p class="message">Não registrado? <a href="#">Crie um Conta</a></p>
      </form>
    </div>
  </div>
  <!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src="login/script.js"></script>

  <!-- CRIAR USUÁRIO -->
  <?php 
    if(isset($_POST['criar_usuario'])){
      /*PEGAR DADOS DO CAMPO VIA POST*/
      $email = mysqli_real_escape_string($conexao, $_POST['email']);
      $senha = mysqli_real_escape_string($conexao, $_POST['senha']);
      $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
      $nivel = 1; /*NIVEL ADMINISTRADOR */

      /*INSERT NA TABELA DO BDS*/ 
      $query = "INSERT INTO admins  ( email, senha, nome, nivel) VALUES ( '$email', '$senha', '$nome', '$nivel')";
      $result = mysqli_query($conexao, $query);

      /*VERIFICAR SE A CONEXÃO FOI UM SUCESSO*/
      if($result == ''){
        echo "<script language='javascript'>window.alert('Erro ao cadastrar usuário!'); </script>";
        echo "<script language='javascript'>window.location='index.php'; </script>";
      }else{
        echo "<script language='javascript'>window.alert('Usuário cadastrado com sucesso!'); </script>";
        echo "<script language='javascript'>window.location='index.php'; </script>";
      }

    } ?>

</body>

</html>