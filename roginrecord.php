<?php
session_start();
// セッション開始
$db['host'] = 'localhost';
$db['user'] = 'g031o163';
$db['pass'] = 'uJqY5ht6wacvacip';
$db['dbname'] = 'g031o163';
$errorMessage = "";
// エラーメッセージの初期化

if (isset($_POST["ログイン"])) {
  $name = $_POST["name"];
  $dsn = sprintf('mysql: host=%s; dbname=%s; charset=utf8', $db['host'], $db['dbname']);

  try {
    $pdo = new PDO($dsn, $db['user'], $db['pass'], array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));

    $stmt = $pdo->prepare('SELECT * FROM user　WHERE name = ?');
    $stmt->execute(array($userid));

    $password = $_POST["password"];

    if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      if (password_verify($password, $row['password'])) {
        session_regenerate_id(true);
      }
      $_SESSION["NAME"] = $row['name'];
      header("Location: top.php"); // メイン画面へ遷移]
      exit();  // 処理終了
    } else {
      // 認証失敗
      $errorMessage = 'ユーザーIDあるいはパスワードに誤りがあります。';
    }
  } catch (PDOException $e) {
    $errorMessage = 'データベースエラー';
    //$errorMessage = $sql;
    // $e->getMessage() でエラー内容を参照可能（デバッグ時のみ表示）
    // echo $e->getMessage();
  }
}
?>
