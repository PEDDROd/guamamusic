<?php
session_start();
$TITLE = 'Não encontrado'; 
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/ico" href="../src/sound-icon-mac-os-sound-icon-11553431933s3k4oijqpf.png">
    <link href="../vendor/twbs/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
    <link href="../vendor/fortawesome/font-awesome/css/all.css" rel="stylesheet">
    <link href="../src/styles.css" rel="stylesheet">
    <title><?=$TITLE; ?></title>
  </head>
  <body>
	<div class="alert alert-info" role="alert">
		<h1><i class="fa-solid fa-circle-xmark fa-beat"></i> Não encontrado</h1>
		<h5>Possívelmente o sistema está fora do ar!</h5>
		<a class="btn btn-outline-primary" <?=(isset($_SESSION['DadosUsuario']['id_user']) ? 'href="../main.php' : 'href="../index.php"')  ?> role="button"><i class="fa-solid fa-arrow-rotate-right"></i> Tentar novamente</a>
	</div>
  </body>
</html>