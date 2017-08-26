<?php

$username = "root";
$password = "";

$id = $_GET['id'];


try {
  $pdo = new PDO('mysql:host=localhost;dbname=mercadorias', $username, $password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $stmt = $pdo->prepare('UPDATE mercadorias SET tipo = :tipo, nome = :nome, quantidade = :quantidade, preco = :preco, tiponegocio = :negocio WHERE id = :id');
  $stmt->execute(array(
    ':id' => $_POST['id'],
    ':tipo' => $_POST['tipo'],
    ':nome' => $_POST['nome'],
    ':quantidade' => $_POST['quantidade'],
    ':preco' => $_POST['preco'],
    ':negocio' => $_POST['tiponegocio']
  ));

  echo $stmt->rowCount();
} catch(PDOException $e) {
  echo 'Error: ' . $e->getMessage();
}
?>
