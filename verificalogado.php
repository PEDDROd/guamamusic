<?php
session_start();
if(isset($_SESSION['DadosUsuario']['id_user'])){
    $_SESSION['ERROR'] = '<div class="alert alert-warning" role="alert" align="center"><i class="fa-solid fa-circle-exclamation fa-fade"></i> Você não está logado!</div>';
    header("Location: ../index.php");
    exit();
}