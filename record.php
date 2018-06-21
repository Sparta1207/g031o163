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
</center>

<?php
$User_name=$_POST['User_name'];
$password=$_POST['password'];
try{
  $pdo = new PDO('mysql:host=localhost;dbname=g031o163;charset=utf8','root','',
  array(PDO::ATTR_EMULATE_PREPARES => false));
  $stmt = $pdo -> prepare("INSERT INTO user (User_name,password) VALUES (:User_name,:password) ");
  $stmt->bindParam(':User_name',$User_name, PDO::PARAM_STR);
  $stmt->bindParam(':password',$password, PDO::PARAM_STR);
  $stmt->execute();
  $dbh = null;
  $stmt = $pdo->query("SELECT * FROM `user`");
  while($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
    echo '<tr>';
    foreach($row as $key){
      echo '<td>'.$key.'</td>';
    }
    echo '</tr>';
  }
} catch (PDOException $e) {
  exit('データベース接続失敗。'.$e->getMessage());
}
?>
