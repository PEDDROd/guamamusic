<?php

require __DIR__ .'/vendor/autoload.php';
date_default_timezone_set('America/Belem');
$STORE_NAME = 'GuamaMusic';
#----------------------------------------- Database ------------------------------------------------------------- #
$DBIP = '127.0.0.1:3306';
$DBA = 'root';
$DBAPASS = '';
$DB = 'guamamusicdb';

try{
    $CONN = mysqli_connect($DBIP, $DBA, $DBAPASS, $DB);
}catch (Exception $e) {
    $ErroMessage = '<i class="fa-solid fa-triangle-exclamation fa-beat" style="color:#e84118;"></i> Algo deu errado!';
    $DevMsg = $e->getMessage().'\n';
    header('Location: pages/Not_found.php');
    exit();
}