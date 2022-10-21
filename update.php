<?php
  include_once('./dbconnect.php');

  // 1.画面で入力された値を取得
  $id = $_POST['id'];
  $date = $_POST['date'];
  $title = $_POST['title'];
  $amount = $_POST['amount'];
  $type = $_POST['type'];

  //SQL文
  $sql = 'UPDATE records SET title = :title, type = :type, amount = :amount, date = :date, updated_at = now() WHERE id = :id';
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':id', $id, PDO::PARAM_INT);
  $stmt->bindParam(':title', $title, PDO::PARAM_STR);
  $stmt->bindParam(':type', $type, PDO::PARAM_INT);
  $stmt->bindParam(':amount', $amount, PDO::PARAM_INT);
  $stmt->bindParam(':date', $date, PDO::PARAM_STR);
  // SQLを実行
  $stmt->execute();

  header('Location: ./index.php');
  exit;
?>