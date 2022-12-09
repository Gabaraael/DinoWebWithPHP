<?php
  include_once "funcao.php";
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  $dinossauro = array();
  // variavel global $_POST
  $dinossauro['id'] = $_POST['id'];
  $dinossauro['nome'] = $_POST['nome'];
  $dinossauro['especie'] = $_POST['especie'];
  $dinossauro['familia_id'] = $_POST['familia_id'];
  $dinossauro['foto'] = $_POST['foto'];

  $arquivo = $_FILES['arquivo'];
  if ($arquivo['name']!="") {
    $arquivoTemporario = $arquivo['tmp_name'];
    $extensao = pathinfo($arquivo['name'], PATHINFO_EXTENSION);
    $nomeArquivo = sha1(time()).".".$extensao;
    move_uploaded_file($arquivoTemporario, "imagens/".$nomeArquivo);
    if ($dinossauro['foto'] != "") {
      unlink('imagens/'.$dinossauro[foto]);
    }
    $dinossauro['foto'] = $nomeArquivo;
  }
    

  if ($dinossauro['id'] == 0) {
    salvarDinossauro($dinossauro);
  } else {
    alterarDinossauro($dinossauro);
  }
  setcookie("mensagem", "{$dinossauro['nome']} foi salvo");
  
  header('location: dinossauros.php');
 ?>
