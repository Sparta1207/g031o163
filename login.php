<?php
session_start();

$db['host'] = 'localhost';
$db['user'] = 'g031o163';
$db['pass'] = 'uJqY5ht6wacvacip';
$db['dbname'] = 'g031o163';

// エラーメッセージの初期化
$errorMessage = "";

// ログインボタンが押された場合
if (isset($_POST["login"])) {
  // 1. ユーザIDの入力チェック
  if (empty($_POST["userid"])) {  // emptyは値が空のとき
    $errorMessage = 'ユーザーIDが未入力です。';
  } else if (empty($_POST["password"])) {
    $errorMessage = 'パスワードが未入力です。';
  }

  if (!empty($_POST["userid"]) && !empty($_POST["password"])) {
    // 入力したユーザIDを格納
    $userid = $_POST["userid"];

    // 2. ユーザIDとパスワードが入力されていたら認証する
    $dsn = sprintf('mysql: host=%s; dbname=%s; charset=utf8', $db['host'], $db['dbname']);

    // 3. エラー処理
    try {
      $pdo = new PDO($dsn, $db['user'], $db['pass'], array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));

      $stmt = $pdo->prepare('SELECT * FROM users WHERE name = ?');
      $stmt->execute(array($userid));

      $password = $_POST["password"];

      if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        if (password_verify($password, $row['password'])) {
          session_regenerate_id(true);

          // 入力したIDのユーザー名を取得
          $id = $row['id'];
          $sql = "SELECT * FROM users WHERE id = $id";  //入力したIDからユーザー名を取得
          $stmt = $pdo->query($sql);
          foreach ($stmt as $row) {
            $row['name'];  // ユーザー名
          }
          $_SESSION["NAME"] = $row['name'];
          // header( "Location:http://localhost/top.php" );
          header("Location:top.php");  // メイン画面へ遷移
          exit();  // 処理終了
        }  else {
          // 認証失敗
          $errorMessage = 'ユーザーIDあるいはパスワードに誤りがあります。';
        }
      } else {
        // 4. 認証成功なら、セッションIDを新規に発行する
        // 該当データなし
        $errorMessage = 'ユーザーIDあるいはパスワードに誤りがあります。';
      }
    } catch (PDOException $e) {
      $errorMessage = 'データベースエラー';
      //$errorMessage = $sql;
      // $e->getMessage() でエラー内容を参照可能（デバッグ時のみ表示）
      // echo $e->getMessage();
    }
  }
}
?>

<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <title>ログイン</title>
</head>
<center>
  <body>
    <h1>ログイン画面</h1>
    <form id="loginForm" name="loginForm" action="" method="POST">
      <legend>ログインフォーム</legend>
      <div><font color="#ff0000"><?php echo htmlspecialchars($errorMessage, ENT_QUOTES); ?></font></div>
      <label for="userid">ユーザーID</label><input type="text" id="userid" name="userid" placeholder="ユーザーIDを入力" value="<?php if (!empty($_POST["userid"])) {echo htmlspecialchars($_POST["userid"], ENT_QUOTES);} ?>">
      <br>
      <label for="password">パスワード</label><input type="password" id="password" name="password" value="" placeholder="パスワードを入力">
      <br>
      <input type="submit" id="login" name="login" value="ログイン">
    </form>
    <br>
    <form action="signup.php">
      <legend>新規登録フォーム</legend>
      <input type="submit" value="新規登録">
    </form>
    <br>
    <div id="google_translate_element"></div><script type="text/javascript">
    function googleTranslateElementInit() {
      new google.translate.TranslateElement({pageLanguage: 'ja', includedLanguages: 'en,ja,zh-CN', layout: google.translate.TranslateElement.FloatPosition.BOTTOM_RIGHT}, 'google_translate_element');
    }
    </script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
  </center>
</body>
</html>
