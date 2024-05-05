<?php
session_start();
require __DIR__.'/../config.php';

$LogarUser = filter_var($_POST["userlogin"], FILTER_SANITIZE_STRING);
$LogarSenha = filter_var($_POST["passlogin"], FILTER_SANITIZE_STRING);

$ContaExists = mysqli_num_rows(mysqli_query($CONN,"SELECT id_user FROM users WHERE id_user='".$LogarUser."' AND senhauser='$LogarSenha'"));

if(strlen($LogarUser)>=5 and strlen($LogarUser)<=50 and strlen($LogarSenha)>=8 and strlen($LogarSenha)<=32 and $ContaExists==1){

    $DataLogin = mysqli_query($CONN, "SELECT id_user,nameuser,isverified FROM users WHERE id_user='".$LogarUser."' AND senhauser='".$LogarSenha."'");
    $_SESSION['DadosUsuario'] = $DataLogin->fetch_assoc();
    header("Location: ../pages/main.php");
    exit();
}else{
    $_SESSION['ERROR']='<div class="alert alert-danger" role="alert" align="center"><i class="fa-solid fa-circle-exclamation fa-fade"></i> Erro ao logar tente novamente!</div>';
    header("Location: ../index.php");
    exit();
}