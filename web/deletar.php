<?php

$username = "root";
$password = "";

$id = $_GET['id'];

try {
  $pdo = new PDO('mysql:host=localhost;dbname=mercadorias', $username, $password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $stmt = $pdo->prepare('DELETE FROM mercadorias WHERE id = :id');
  $stmt->bindParam(':id', $id);
  $stmt->execute();
  echo "Deletado com sucesso!";
  $redirect = "lista_mercadoria.php";
  header("location:$redirect");
} catch(PDOException $e) {
  echo 'Error: ' . $e->getMessage();
}
?>
