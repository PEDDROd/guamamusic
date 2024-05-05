<?php
require __DIR__.'/config.php';
session_start();
$TITLE = 'GuamaMusic - Página Principal';
?>
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/ico" href="./src/sound-icon-mac-os-sound-icon-11553431933s3k4oijqpf.png">
    <link href="./vendor/twbs/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
    <link href="./vendor/fortawesome/font-awesome/css/all.css" rel="stylesheet">
    <link href="./src/styles.css" rel="stylesheet">
    <title><?=$TITLE; ?></title>
  </head>
  <body>
    <div class="login">
            <section class="formlogin">
			<?php
				if(isset($_SESSION['ERROR'])){
					echo $_SESSION['ERROR'];
					unset($_SESSION['ERROR']);
				}else{
					unset($_SESSION['ERROR']);
				}
			?>
			<div class="container" id="container">
				<div class="form-container sign-up-container">
					<form action="./scripts/criarconta.php" method="POST" role="form">
						<h1>Criar conta</h1>
						<span>Crie um usuário para se registrar</span>
						<input type="text" name="novonome" id="novonome" placeholder="Nome" minlength="3" maxlength="15" required/>
						<input type="text" name="novouser" id="novouser" placeholder="Usuário" minlength="5" maxlength="50" required/>
						<input type="password" name="novasenha" id="novasenha" placeholder="********" minlength="8" maxlength="32" required/>
						<button type="submit"><i class="fa-solid fa-user-plus"></i> Criar conta</button>
					</form>
				</div>
				<div class="form-container sign-in-container">
					<form action="./scripts/logar.php" method="POST" role="form">
						<h1>Logar</h1>
						<span>Usando sua conta</span>
						<input type="text" id="userlogin" name="userlogin" placeholder="Usuário" minlength="5" maxlength="50" required/>
						<input type="password" id="passlogin" name="passlogin"  placeholder="********" minlength="8" maxlength="50" required/>
						<button type="submit"><i class="fa-solid fa-arrow-right-to-bracket"></i> Entrar</button>
					</form>
				</div>
				<div class="overlay-container">
					<div class="overlay">
						<div class="overlay-panel overlay-left">
                            <a href="./"><img src="./src/images/logo guama music.png"></a>
							<p>Para se conectar com uma conta já existente basta selecionar o botão abaixo</p>
							<button class="ghost" id="signIn"><i class="fa-solid fa-door-open"></i> Logar</button>
						</div>
						<div class="overlay-panel overlay-right">
                            <a href="./"><img src="./src/images/logo guama music.png"></a>
							<p>Crie uma conta para ser possível acompanhar os seus artistas locais favoritos</p>
							<button class="ghost" id="signUp"><i class="fa-solid fa-circle-plus"></i> Criar conta</button>
						</div>
					</div>
				</div>
			</div>		
		</section>
        <footer class="loginfooter">
            <p>GuamaMusic Blog - 2024</p>
        </footer>
    </div>
    <script src="./vendor/components/jquery/jquery.js"></script>
    <script src="./vendor/twbs/bootstrap/dist/js/bootstrap.bundle.js"></script>
    <script src="./src/scriptjs.js"></script>
  </body>
</html>