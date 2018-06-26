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
      <!-- record.phpに渡す -->
        ユーザ名:<input type="text" name="User_name"size="20"maxlength="15"><br><br>
        <!-- ユーザー名入力 -->
        パスワード:<input type="text" name="password"size="20"maxlength="15"><br><br>
        <!-- パスワード入力 -->
        <input type = "submit" value = "登録" span style="color:#ff0000;"/>
        <!-- 送信ボタン -->
      </form>
    </center>
  </body>
  </html>
