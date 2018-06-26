<!DOCTYPE html>
<html lang = "ja">
<head>
  <meta charset = "UFT-8">
  <title>表示</title>
</head>
<body>
  <center>
  <h1>登録結果</h1>
</body>
<table border="1">
  <tr><th>id</th><th>名前</th><th>パスワード</th></tr>
  <!-- 表式決定 -->
</center>

<?php
$User_name=htmlspecialchars($_POST['User_name']);
// ユーザー名受け取り
$password=htmlspecialchars($_POST['password']);
// パスワード受け取り
try{
  $pdo = new PDO('mysql:host=localhost;dbname=g031o163;charset=utf8','root','',
  // サーバー情報
  array(PDO::ATTR_EMULATE_PREPARES => false));
  $stmt = $pdo -> prepare("INSERT INTO user (User_name,password) VALUES (:User_name,:password) ");
  // データ挿入
  $stmt->bindParam(':User_name',$User_name, PDO::PARAM_STR);
  $stmt->bindParam(':password',$password, PDO::PARAM_STR);
  $stmt->execute();
  $dbh = null;
  $stmt = $pdo->query("SELECT * FROM `user`");
  // データ選択
  while($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
    echo '<tr>';
    foreach($row as $key){
      echo '<td>'.$key.'</td>';
    }
    echo '</tr>';
  }
  // データ表示
} catch (PDOException $e) {
  exit('データベース接続失敗。'.$e->getMessage());
}
?>
