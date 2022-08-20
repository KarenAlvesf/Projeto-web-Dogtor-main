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
          <div class="row">
            <h3 style="text-align:center;">Consultar agendamento</h3>
            <div class="col-12">
                <form class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 d-flex"  style="margin-top: 25px;margin-bottom: 25px;">
                    <input name="txtpesquisarUsuarios" class="form-control me-2" type="search" placeholder="Pesquisar Usuários" aria-label="Pesquisar" style="margin-right: 5px;">
                    <button name="buttonPesquisar" class="btn btn-secondary" type="submit">Pesquisar
                    </button>
                 </form>
            </div>

            <?php 
                /* PUXA DADOS DA PESQUISA SE TIVER ACIONADO O BOTÃO*/
               if(isset($_GET['buttonPesquisar']) and $_GET['txtpesquisarUsuarios'] != ''){
                  $nome = $_GET['txtpesquisarUsuarios'] . '%';
                  /* ENTÃO VAI FAZER UM SELECT COMPARANDO COM O CAMPO NOME DO BANCO DE DADOS COM O CAMPO DIGITADO*/
                  $pagina = (isset($_GET['txtpesquisarUsuarios?pagina']))? $_GET['txtpesquisarUsuarios?pagina'] : 1; 
                  $query_count = "SELECT * from agenda where nome like '%$nome%' order by nome ";
                  $result_count = mysqli_query($conexao, $query_count);

               }else{
                  /* SENÃO PUXA DADOS NORMAIS*/
                  $query_count = "SELECT * from agenda";
                  $result_count = mysqli_query($conexao, $query_count);
               }

               /* DEPOIS CONECTAR COM O BANCO DE DADOS*/
               $result = mysqli_query($conexao, $query_count);
               /* CONTAR O NÚMERO DE LINHAS DO RESULTADO*/
               $linha_count = mysqli_num_rows($result_count);
               
               /* SE O RESULTADO FOR IGUAL A ZERO É POR QUE A PESQUISA NÃO ENCONTROU NADA*/
               if($linha_count == '0'){
                  echo "
                <div class='card' style='margin-top: 15px;margin-bottom: 15px;'><div style='margin: 15px;' class='alert alert-warning' role='alert'>
               <strong>NENHUM AGENDAMENTO ENCONTRADO!</strong> Em caso de duvidas contate o suporte! :)
               </div></div>";


               /* SENÃO TIVER FEITO A PESQUISA, O SELECT VAI SER FEITO NORMAL E O NUMERO DE LINHAS NÃO VAI SER IGUAL A ZERO*/
               }else{
               
               ?>

                      <div class="col-12">
                          <table class="table">
                              <thead>
                                <tr>
                                  <th scope="col">id</th>
                                  <th scope="col">Nome</th>
                                  <th scope="col">Tipo de animal</th>
                                  <th scope="col">Horário de inicio</th>
                                  <th scope="col">Horário de saida</th>
                                  <th scope="col">Dia</th>
                                </tr>
                              </thead>
                              <tbody>
                              <?php
                                  /* WHILE PRA PECORRER O VETOR E ATRIBUIR VALORES PARA MOSTRAR NA TELA */
                                  while($resdados1 = mysqli_fetch_array($result_count)){
                                  $id= $resdados1["id"];
                                  $nome= $resdados1["nome"];
                                  $tipo= $resdados1["tipo"];
                                  $dia= $resdados1["dia"];
                                  $horario= $resdados1["entrada"];
                                  $saida= $resdados1["saida"];
                              ?>
                              <!-- VAI SE REPETIR -->
                                <tr>
                                  <th scope="row"><?php echo $id ?></th>
                                  <td><?php echo $nome ?></td>
                                  <td><?php echo $tipo ?></td>
                                  <td><?php echo $horario ?></td>
                                  <td><?php echo $saida ?></td>
                                  <td><?php echo $dia ?></td>
                                </tr>
                              <?php } ?>
                              </tbody>
                            </table>
                      </div>

            <?php } ?>

        </div>
    </div>
    
    <!-- partial -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

</body>

</html>

<?php }else{ echo "<script language='javascript'>window.alert('SEM PERMISSÃO!'); </script>"; echo "<script language='javascript'>window.location='index.php'; </script>";} ?>