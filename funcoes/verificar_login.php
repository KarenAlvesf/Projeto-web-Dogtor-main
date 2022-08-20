<?php include_once('../conexao.php');session_start(); ?>

<?php

/*PEGAR DADOS DO CAMPO VIA POST*/  
$email = mysqli_real_escape_string($conexao, $_POST['email']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

    /*SELECT DA TABELA DO BD*/  
	$query = "SELECT * from admins where email = '$email' ";
	$result = mysqli_query($conexao, $query); 

    /*ARRAY DE DADOS*/  
	$dado = mysqli_fetch_array($result); 

    /*RESULTADO DE LINHAS ACHADAS NO BD*/ 
	$linha = mysqli_num_rows($result);

   

    /*VERIFICAR SE EXISTE USUÁRIO*/  
	if ($linha > 0){ 

         /*PEGAR A SENHA DO USUÁRIO*/  
	    @$senhabd = $dado['senha'];

        /*VERIFICAR SE A SENHA BATE COM O USUÁRIO REGISTRADO*/  
        if($senha == $senhabd ){

            $_SESSION['session_nome'] = $dado['nome'];
            $_SESSION['nivel'] = $dado['nivel'];
            header('Location:../menu.php');/*DIRECIONAR USUÁRIO*/  
            exit();/*FECHANDO EXECUÇÃO DESSE BLOCK DE CÓDIGO*/  

        /*SE O USUÁRIO ACERTAR A SENHA MAS O EMAIL*/   
        }else{
            /*DIRECIONAR O USUÁRIO VIA JAVASCRIPT E MOSTRAR MENSAGEM*/
            echo "<script language='javascript'>window.alert('Senha errada'); </script>";
            echo "<script language='javascript'>window.location='../index.php'; </script>";
        }	

    /*SE NÃO EXISTIR USUÁRIO*/    
	}else{
        /*DIRECIONAR O USUÁRIO VIA JAVASCRIPT E MOSTRAR MENSAGEM*/
        echo "<script language='javascript'>window.alert('Não existe esse usuário'); </script>";
        echo "<script language='javascript'>window.location='../index.php'; </script>";
    }

?>