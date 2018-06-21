# g031o163

<!DOCTYPE html>
<html lang = "ja">
<head>
  <meta charset = "UFT-8">
  <title>ユーザ登録</title>
</head>
<body>
  <center>
    <h1>ユーザ登録</h1>
    <form method = "POST" action = "record.php">
        ユーザ名:<input type="text" name="User_name"size="20"maxlength="15"><br><br>
        パスワード:<input type="text" name="password"size="20"maxlength="15"><br><br>
        <input type = "submit" value = "登録" span style="color:#ff0000;"/>
      </form>
    </center>
  </body>
  </html>

<?php
  try {
    $pdo = new PDO('mysql:host=localhost;dbname=g031o163;charset=utf8','root','',
    array(PDO::ATTR_EMULATE_PREPARES => false));
  } catch (PDOException $e) {
    exit('データベース接続失敗。'.$e->getMessage());
  }
?>
