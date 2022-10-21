<?php
  include_once('./dbconnect.php');

  $id = $_GET['id'];
  var_dump($id);
  // 1.画面で入力された値を取得
  $sql ='DELETE FROM records WHERE id = :id';
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':id', $id, PDO::PARAM_INT);

  //SQLの実行
  $stmt->execute();

  header('Location: ./index.php');
  exit;
?>