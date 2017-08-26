<?php
$username = "root";
$password = "";

$id = $_POST['id'];
$tipo = $_POST['tipo'];
$nome = $_POST['nome'];
$quantidade = $_POST['quantidade'];
$preco = $_POST['preco'];
$tiponegocio = $_POST['tiponegocio'];

try {
  $pdo = new PDO('mysql:host=localhost;dbname=mercadorias', $username, $password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $stmt = $pdo->prepare('INSERT INTO mercadorias VALUES(:id, :tipo, :nome, :quantidade, :preco, :tiponegocio)');
  $stmt->execute(array(
    ':id' => $_POST['id'],
    ':tipo' => $_POST['tipo'],
    ':nome' => $_POST['nome'],
    ':quantidade' => $_POST['quantidade'],
    ':preco' => $_POST['preco'],
    ':tiponegocio' => $_POST['tiponegocio']));
   echo $stmt->rowCount();
   $redirect = "lista_mercadoria.php";
   header("location:$redirect");

} catch(PDOException $e) {
  echo 'Error: ' . $e->getMessage();
  }
   ?>
