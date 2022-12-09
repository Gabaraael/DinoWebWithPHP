<?php
  include_once "funcao.php";
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

// variavel global que contem informacoes do método GET
  $id = $_GET['id'];
  $validate = validateFamilyDelete($id);

  if($validate['validate'] == 1) {
    setcookie("message", "Não é possível excluir a família pois ela possui um ou mais membros");    
    header('location: familias.php');
  }else {
    $familia = getFamilia($id);
        excluirFamilia($id);
        setcookie("mensagem", "Família {$familia['nome']} foi excluída");
        header('location: familias.php');
  }
  
 ?>
