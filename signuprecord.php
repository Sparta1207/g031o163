<?php
session_start();
// セッション開始
$db['host'] = 'localhost';
$db['user'] = 'g031o163';
$db['pass'] = 'uJqY5ht6wacvacip';
$db['dbname'] = 'g031o163';

$errorMessage = "";
// エラーメッセージ初期化

if (isset($_POST['登録'])) { // 登録ボタンが押されたら
  $name = $_POST['name'];
  $password = $_POST['password'];
  $dsn = sprintf('mysql: host=%s; dbname=%s; charset=utf8', $db['host'], $db['dbname']);

  try{
    $pdo = new PDO($dsn, $db['user'], $db['pass'],array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
    // サーバー情報
    $stmt = $pdo -> prepare("INSERT INTO user (name,password) VALUES (?,?) ");
    // データ挿入
    $stmt->execute(array($name, password_hash($password, PASSWORD_DEFAULT)));
    // パスワードのハッシュ化
    $userid = $pdo->lastinsertid();

    echo '<script> alert("登録が完了しました。");</script>';
    header( "Location:http://localhost/roginform.html" );
  }catch(Exception $e){
    $errorMessage = 'データベースエラー';
    // $e->getMessage() でエラー内容を参照可能（デバッグ時のみ表示）
    // echo $e->getMessage();
  }
}
?>
