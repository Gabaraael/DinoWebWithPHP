<?php
  include_once "funcao.php";
  session_start();
  if (!isset($_SESSION['usuario'])) {
    header("location: loginForm.php");
    exit(0);
  }

 ?>

<nav class="navbar navbar-expand-md navbar-dark fixed-top  " style="background-color: #3498db;">
  <div class="container-fluid" style=" display: flex; justify-content: space-between;">
    <a class="navbar-brand" href="dinoIndex.php">      
      <img src="imagens/Dino3.png">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav me-auto mb-2 mb-md-0">
      <li class="nav-item">
      <a class="nav-link " aria-current="page"  href="dinoIndex.php">Home</a>
        </li>      
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="dinossauros.php">Dinossauros</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="familias.php">Famílias</a>
        </li>      
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="logout.php" style="color: white; position: fixed; right: 36px; margin-left: 10px; opacity: 1.5;">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
