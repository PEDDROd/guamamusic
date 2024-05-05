<?php
require __DIR__.'../../config.php';
session_start();
if(!isset($_SESSION['DadosUsuario']['id_user'])){
    $_SESSION['ERROR'] = '<div class="alert alert-warning" role="alert" align="center"><i class="fa-solid fa-circle-exclamation fa-fade"></i> Você não está logado!</div>';
    header("Location: ../index.php");
    exit();
}
if($_SESSION['DadosUsuario']['isverified']==1){
    $UserVerificado =  $_SESSION['DadosUsuario']['id_user'].' <i class="fa-solid fa-circle-check" style="color: #00a8ff"></i>';
}else{ 
  $UserVerificado =  $_SESSION['DadosUsuario']['id_user'];
}

$PostsUser = mysqli_query($CONN, "SELECT post,img,userpost FROM posts");
for($a=0; $a<mysqli_num_rows($PostsUser); $a++){
    $PostData = $PostsUser->fetch_assoc();
    $DadosPosts[$a][] = $PostData['post'];
    $DadosPosts[$a][] = $PostData['img'];
    $DadosPosts[$a][] = $PostData['userpost'];
}
$TITLE = 'GuamaMusic - Timeline';
?>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=$TITLE; ?></title>
    <link rel="shortcut icon" type="image/png" href="../src/sound-icon-mac-os-sound-icon-11553431933s3k4oijqpf.png" />
    <link rel="stylesheet" href="../src/styles.css" />
    <link href="../vendor/fortawesome/font-awesome/css/all.css" rel="stylesheet" />
    <link href="../vendor/twbs/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
  </head>
  <body>
    <div class="topnav" id="myTopnav">
      <span><img src="../src/images/logo guama music.png" width="30px"></span>
      <a href="./main.php">Timeline</a>
      <span>@<?=$UserVerificado ?></span>
      <a href="./main.php" class="active"><i class="fa-solid fa-rotate fa-spin"></i> Atualizar timeline</a>
      <a href="../scripts/deslogar.php"><i class="fa-solid fa-right-from-bracket"></i> Deslogar</a>
      <a href="javascript:void(0);" class="icon" onclick="myFunction()">
        <i class="fa fa-bars"></i>
      </a>
    </div>
    <div class="postagembotao">
      <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-solid fa-feather fa-shake"></i> Criar postagem</button>
    </div>
    <section class="timelinecards">
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="fa-solid fa-feather-pointed"></i> Postar</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="../scripts/postar.php" role="form">
              <div class="modal-body">
                  <label for="postagem" class="form-label">Escreva sua postagem</label>
                  <textarea class="form-control" id="postagem" name="postagem" rows="5" maxlength="200" required></textarea>
                  <p><small>Limite de 200 caracteres</small></p>
                  <label for="imagem" class="form-label">Url imagem</label>
                  <input type="text" class="form-control" id="imagem" name="imagem" placeholder="Cole a URL da sua imagem aqui" required>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-primary">Enviar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <?php
				if(empty($DadosPosts)){
             echo '<h3><i class="fa-solid fa-face-sad-tear"></i> Não há posts até esse momento<h3>';
           }else{
              foreach($DadosPosts as $Datap){
                 echo '<div class="card" style="width: 265px">';
                      if($Datap[1]=='' or empty($Datap[1])){ 
                        echo '';
                      }else{ 
                        echo '<img src="'.$Datap[1].'" class="card-img-top" width="260px" alt="imgpost">';
                      }
                      echo '<div class="card-body">
                            <h4 class="card-title">'.$Datap[2].'</h4>
                          <p class="card-text">'.$Datap[0].'</p>
                        </div>
                      </div>';
              }
           }
      ?>
    </section>
    <script src="../vendor/components/jquery/jquery.js"></script>
    <script src="../vendor/twbs/bootstrap/dist/js/bootstrap.bundle.js"></script>
    <script>
      function myFunction() {
        var x = document.getElementById("myTopnav");
        if (x.className === "topnav") {
          x.className += " responsive";
        } else {
          x.className = "topnav";
        }
      }
    </script>
  </body>
</html>