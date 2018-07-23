<?php
session_start();

$db['host'] = 'localhost';
$db['user'] = 'g031o163';
$db['pass'] = 'uJqY5ht6wacvacip';
$db['dbname'] = 'g031o163';

// エラーメッセージ、登録完了メッセージの初期化
$errorMessage = "";
$signUpMessage = "";

// ログインボタンが押された場合
if (isset($_POST["signUp"])) {
  // 1. ユーザIDの入力チェック
  if (empty($_POST["username"])) {  // 値が空のとき
    $errorMessage = 'ユーザーIDが未入力です。';
  } else if (empty($_POST["password"])) {
    $errorMessage = 'パスワードが未入力です。';
  } else if (empty($_POST["password2"])) {
    $errorMessage = 'パスワードが未入力です。';
  }

  if (!empty($_POST["username"]) && !empty($_POST["password"]) && !empty($_POST["password2"]) && $_POST["password"] === $_POST["password2"]) {
    // 入力したユーザIDとパスワードを格納
    $username = $_POST["username"];
    $password = $_POST["password"];

    // 2. ユーザIDとパスワードが入力されていたら認証する
    $dsn = sprintf('mysql: host=%s; dbname=%s; charset=utf8', $db['host'], $db['dbname']);

    // 3. エラー処理
    try {
      $pdo = new PDO($dsn, $db['user'], $db['pass'], array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));

      $stmt = $pdo->prepare("INSERT INTO users(name, password) VALUES (?, ?)");

      $stmt->execute(array($username, password_hash($password, PASSWORD_DEFAULT)));  // パスワードのハッシュ化を行う（今回は文字列のみなのでbindValue(変数の内容が変わらない)を使用せず、直接excuteに渡しても問題ない）
      $userid = $pdo->lastinsertid();  // 登録した(DB側でauto_incrementした)IDを$useridに入れる

      $signUpMessage = '登録が完了しました。';  // ログイン時に使用するIDとパスワード
    } catch (PDOException $e) {
      $errorMessage = 'データベースエラー';
      // $e->getMessage() でエラー内容を参照可能（デバッグ時のみ表示）
      // echo $e->getMessage();
    }
  } else if($_POST["password"] != $_POST["password2"]) {
    $errorMessage = 'パスワードに誤りがあります。';
  }
}
?>

<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <title>新規登録</title>
</head>
<center>
  <body>
    <h1>新規登録画面</h1>
    <form id="loginForm" name="loginForm" action="" method="POST">
      <legend>新規登録</legend>
      <div><font color="#ff0000"><?php echo htmlspecialchars($errorMessage, ENT_QUOTES); ?></font></div>
      <div><font color="#0000ff"><?php echo htmlspecialchars($signUpMessage, ENT_QUOTES); ?></font></div>
      <label for="username">ユーザー名</label><input type="text" id="username" name="username" placeholder="ユーザー名を入力" value="<?php if (!empty($_POST["username"])) {echo htmlspecialchars($_POST["username"], ENT_QUOTES);} ?>">
      <br>
      <label for="password">パスワード</label><input type="password" id="password" name="password" value="" placeholder="パスワードを入力">
      <br>
      <label for="password2">パスワード(確認用)</label><input type="password" id="password2" name="password2" value="" placeholder="再度パスワードを入力">
      <br>
      <input type="submit" id="signUp" name="signUp" value="新規登録">
    </form>
    <br>
    <form action="login.php">
      <input type="submit" value="ログイン画面へ">
    </form>
  </body>
</center>
</html>

<center>
  <div id="google_translate_element"></div><script type="text/javascript">
  function googleTranslateElementInit() {
    new google.translate.TranslateElement({pageLanguage: 'ja', includedLanguages: 'en,ja,zh-CN', layout: google.translate.TranslateElement.FloatPosition.BOTTOM_RIGHT}, 'google_translate_element');
  }
  </script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</center>
