<?php
session_start();
require __DIR__.'/../config.php';

$CriarNome = filter_var($_POST["novonome"], FILTER_SANITIZE_STRING);
$CriarUser = filter_var($_POST["novouser"], FILTER_SANITIZE_STRING);
$CriarSenha = filter_var($_POST["novasenha"], FILTER_SANITIZE_STRING);

if(strlen($CriarNome)>=3 and strlen($CriarNome)<=15 and !strpbrk($CriarNome, '1234567890!@#$%^&*()_=+[];/,\|><~`.-') and strlen($CriarUser)>=5 and strlen($CriarUser)<=50 and !strpbrk($CriarUser, '!@#$%^&*()=+[];/,\|><~`.-') and strlen($CriarSenha)>=8 and strlen($CriarSenha)<=32){
    
    $UserExists = mysqli_num_rows(mysqli_query($CONN,"SELECT id_user FROM users WHERE id_user='".$CriarUser."'"));

    if($UserExists==0){
        mysqli_query($CONN,"INSERT INTO users(id_user,nameuser,senhauser) VALUES ('".$CriarUser."','".$CriarNome."','".$CriarSenha."')");        
        $_SESSION['ERROR']='<div class="alert alert-success" role="alert" align="center"><i class="fa-solid fa-circle-check"></i> Conta criada! Seja bem vindo!</div>';
        header("Location: ../index.php");
        exit();
    }else{
        $_SESSION['ERROR']='<div class="alert alert-warning" role="alert" align="center"><i class="fa-solid fa-circle-info"></i> O Usuário informado não é válido ou já está cadastrado em nosso banco de dados!<br>Por favor, tente outro!</div>';
        header("Location: ../index.php");
        exit();
    }
}else{
    $_SESSION['ERROR']='<div class="alert alert-danger" role="alert" align="center"><i class="fa-solid fa-circle-exclamation fa-fade"></i> Os dados informados estão fora do padrão!</div>';
    header("Location: ../index.php");
    exit();
}
mysqli_close($CONN);