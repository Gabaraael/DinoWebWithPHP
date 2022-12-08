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
    $sql = "SELECT * from dinossauro";
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

  function salvarProfessor($professor) {
    $conexao = getConnection();
    $sql = "INSERT INTO professor (nome, email, familia_id, data_aniversario, foto) VALUES (?,?,?,?,?)";
    $sentenca = $conexao->prepare($sql);
    $sentenca->bindParam(1, $professor['nome']);
    $sentenca->bindParam(2, $professor['email']);
    $sentenca->bindParam(3, $professor['familia_id']);
    $sentenca->bindParam(4, $professor['data_aniversario']);
    $sentenca->bindParam(5, $professor['foto']);
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

  function excluirProfessor($id) {
    $conexao = getConnection();
    $sql = "DELETE FROM professor WHERE id=?";
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

  function getProfessor($id) {
    $conexao = getConnection();
    $sql = "SELECT * FROM professor WHERE id=?";
    $sentenca = $conexao->prepare($sql);
    $sentenca->bindParam(1, $id);
    $sentenca->execute();
    $professor = $sentenca->fetch(PDO::FETCH_ASSOC);
    $conexao = null;
    return $professor;
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

  function alterarProfessor($professor) {
    $conexao = getConnection();
    $sql = "UPDATE professor SET nome=?, email=?, familia_id=?, data_aniversario=?, foto=? WHERE id=?";
    $sentenca = $conexao->prepare($sql);
    $sentenca->bindParam(1, $professor['nome']);
    $sentenca->bindParam(2, $professor['email']);
    $sentenca->bindParam(3, $professor['familia_id']);
    $sentenca->bindParam(4, $professor['data_aniversario']);
    $sentenca->bindParam(5, $professor['foto']);
    $sentenca->bindParam(6, $professor['id']);
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

  function getUserByEmail($email) {
    $conexao = getConnection();
    $sql = "SELECT * FROM usuario WHERE email=?";
    $sentenca = $conexao->prepare($sql);
    $sentenca->bindParam(1, $email);
    $sentenca->execute();
    $usuario = $sentenca->fetch(PDO::FETCH_ASSOC);
    $conexao = null;
    return $usuario;
  }

 ?>
