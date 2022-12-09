<?php
  function getConnection() {
    try {
        $conexao = new PDO('mysql:host=localhost;dbname=dino_web;port=3305', "root", "");
        return $conexao;
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }
  }

  function getDinossauros() {
    $conexao = getConnection();
    $sql = "SELECT dino.*, f.nome as familia from dinossauro dino JOIN familia f on f.id = dino.familia_id" ;
    $sentenca = $conexao->query($sql, PDO::FETCH_ASSOC);
    $dados = $sentenca->fetchAll();
    $conexao = null;
    return $dados;
  }

  function getFamilias() {
    $conexao = getConnection();
    $sql = "SELECT * FROM familia ORDER BY nome";
    $sentenca = $conexao->query($sql, PDO::FETCH_ASSOC);
    $dados = $sentenca->fetchAll();
    $conexao = null;
    return $dados;
  }

  function salvarDinossauro($dinossauro) {
    $conexao = getConnection();
    $sql = "INSERT INTO dinossauro (nome, especie, familia_id, foto) VALUES (?,?,?,?)";
    $sentenca = $conexao->prepare($sql);
    $sentenca->bindParam(1, $dinossauro['nome']);
    $sentenca->bindParam(2, $dinossauro['especie']);
    $sentenca->bindParam(3, $dinossauro['familia_id']);    
    $sentenca->bindParam(4, $dinossauro['foto']);
    $sentenca->execute();
    $conexao = null;
  }

  function salvarFamilia($familia) {
    $conexao = getConnection();
    $sql = "INSERT INTO familia (nome) VALUES (?)";
    $sentenca = $conexao->prepare($sql);
    $sentenca->bindParam(1, $familia['nome']);
    $sentenca->execute();
    $conexao = null;
  }

  function excluirDinossauro($id) {
    $conexao = getConnection();
    $sql = "DELETE FROM dinossauro WHERE id=?";
    $sentenca = $conexao->prepare($sql);
    $sentenca->bindParam(1, $id);
    $sentenca->execute();
    $conexao = null;
  }

  function excluirFamilia($id) {
    $conexao = getConnection();
    $sql = "DELETE FROM familia WHERE id=?";
    $sentenca = $conexao->prepare($sql);
    $sentenca->bindParam(1, $id);
    $sentenca->execute();
    $conexao = null;
  }

  function getDinossauro($id) {
    $conexao = getConnection();
    $sql = "SELECT * FROM dinossauro WHERE id=?";
    $sentenca = $conexao->prepare($sql);
    $sentenca->bindParam(1, $id);
    $sentenca->execute();
    $dinossauro = $sentenca->fetch(PDO::FETCH_ASSOC);
    $conexao = null;
    return $dinossauro;
  }

  function validateFamilyDelete($id) {
    $conexao = getConnection();
    $sql = "SELECT exists(SELECT * FROM dinossauro WHERE familia_id=?) as validate";
    $sentenca = $conexao->prepare($sql);
    $sentenca->bindParam(1, $id);
    $sentenca->execute();
    $validate = $sentenca->fetch(PDO::FETCH_ASSOC);
    $conexao = null;
    return $validate;
  }

  function getFamilia($id) {
    $conexao = getConnection();
    $sql = "SELECT * FROM familia WHERE id=?";
    $sentenca = $conexao->prepare($sql);
    $sentenca->bindParam(1, $id);
    $sentenca->execute();
    $familia = $sentenca->fetch(PDO::FETCH_ASSOC);
    $conexao = null;
    return $familia;
  }

  function alterarDinossauro($dinossauro) {
    $conexao = getConnection();
    $sql = "UPDATE dinossauro SET nome=?, especie=?, familia_id=?, foto=? WHERE id=?";
    $sentenca = $conexao->prepare($sql);
    $sentenca->bindParam(1, $dinossauro['nome']);
    $sentenca->bindParam(2, $dinossauro['especie']);
    $sentenca->bindParam(3, $dinossauro['familia_id']);    
    $sentenca->bindParam(4, $dinossauro['foto']);
    $sentenca->bindParam(5, $dinossauro['id']);
    $sentenca->execute();
    $conexao = null;
  }

  function alterarFamilia($familia) {
    $conexao = getConnection();
    $sql = "UPDATE familia SET nome=? WHERE id=?";
    $sentenca = $conexao->prepare($sql);
    $sentenca->bindParam(1, $familia['nome']);
    $sentenca->bindParam(2, $familia['id']);
    $sentenca->execute();
    $conexao = null;
  }

  function getUserByLogin($login) {
    $conexao = getConnection();
    $sql = "SELECT * FROM usuario WHERE login=?";
    $sentenca = $conexao->prepare($sql);
    $sentenca->bindParam(1, $login);
    $sentenca->execute();
    $usuario = $sentenca->fetch(PDO::FETCH_ASSOC);
    $conexao = null;
    return $usuario;
  }

 ?>
