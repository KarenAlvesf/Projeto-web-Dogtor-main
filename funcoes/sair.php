<?php 

/*DESTRUIR AS VARIÁVEIS DE SESSÃO*/
session_start();
session_destroy();
  /*DIRECIONAR O USUÁRIO VIA JAVASCRIPT E MOSTRAR MENSAGEM*/
  echo "<script language='javascript'>window.alert('Logout feito com sucesso!'); </script>";
  echo "<script language='javascript'>window.location='../index.php'; </script>";
exit();

 ?>