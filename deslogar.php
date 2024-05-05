<?php
session_start();
session_destroy();
unset($_SESSION['DadosUsuario']);
$_SESSION['ERROR']='<div class="alert alert-success" role="alert" align="center"><i class="fa-solid fa-circle-check"></i> Você deslogou!</div>';
header('Location: ../index.php');
exit();