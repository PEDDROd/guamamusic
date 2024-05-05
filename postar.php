<?php
session_start();
require __DIR__.'../../config.php';

$PostarNome = filter_var($_POST["postagem"], FILTER_SANITIZE_STRING);
$PostarImg = filter_var($_POST["imagem"], FILTER_SANITIZE_STRING);

if(strlen($PostarNome)>=2 and strlen($PostarNome)<=200){
    
    if($PostarImg=='' or $PostarImg==' '){
        mysqli_query($CONN,"INSERT INTO posts(post,img,userpost) VALUES ('".$PostarNome."','NULL','".$_SESSION['DadosUsuario']['id_user']."')");
        header("Location: ../pages/main.php");
        exit();   
    }else{
        mysqli_query($CONN,"INSERT INTO posts(post,img,userpost) VALUES ('".$PostarNome."','".$PostarImg."','".$_SESSION['DadosUsuario']['id_user']."')");
        header("Location: ../pages/main.php");
        exit();  
    }
}else{
    $_SESSION['ERROR']='<div class="alert alert-danger" role="alert" align="center"><i class="fa-solid fa-circle-exclamation fa-fade"></i> Não foi possível efetuar a postagem!</div>';
    header("Location: ../pages/main.php");
    exit();
}