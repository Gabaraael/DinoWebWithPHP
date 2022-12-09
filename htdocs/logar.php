<?php
  include_once "funcao.php";
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  session_start();
  $login = $_POST['login'];
  $senha = $_POST['password'];
  $senha = md5($senha);
  $usuario = getUserByLogin($login);  
  if (empty($usuario)) {
    header("location: loginForm.php");
  } else {
    if ($usuario['password'] != $senha) {
      header("location: loginForm.php");
    } else {
      $_SESSION['usuario'] = $usuario;
      header("location: dinoIndex.php");
    }
  }
 ?>
