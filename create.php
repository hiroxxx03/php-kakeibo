<?php
  // 2.PHPからMySQLに接続
  include_once('./dbconnect.php');

  // 1.画面で入力された値を取得
  $date = $_POST['date'];
  $title = $_POST['title'];
  $amount = $_POST['amount'];
  $type = $_POST['type'];

  // SQL文を追加
  $sql = "INSERT INTO records(title, type, amount, date, created_at, updated_at) VALUES(:title, :type, :amount, :date, now(), now())";
  // 作成したSQLを実行できるように準備
  $stmt = $pdo->prepare($sql);
  // 値の設定，何を保存するのか
  $stmt->bindParam(':title', $title, PDO::PARAM_STR); // bind=結びつける，param=パラメータ＝外部
  $stmt->bindParam(':type', $type, PDO::PARAM_INT);
  $stmt->bindParam(':amount', $amount, PDO::PARAM_INT);
  $stmt->bindParam(':date', $date, PDO::PARAM_STR);
  // SQLを実行
  $stmt->execute();

  header('Location: ./index.php');
  exit;
?>