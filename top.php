<?php
session_start();

// ログイン状態チェック
if (!isset($_SESSION["NAME"])) {
  header("Location: Logout.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang = "ja">
<head>
  <meta http-equiv="content-type" charset="utf-8">
  <title>ログイン</title>
</head>
<body>
  <right>
    <article>
      <p>ようこそ<?php echo htmlspecialchars($_SESSION["NAME"], ENT_QUOTES); ?>さん</p>
      <ul>
        <li><a href="logout.php">ログアウト</a></li>
      </ul>
    </article>
  </right>
  <center>
    <h1>ホームページ</h1>
    <table border="1">
      <tr><th><input type="button" onClick="location.href = 'top.php';" value="ホーム"　span style="color:#0000ff;"><th>
        <th><input type="button" onClick="location.href = '観光地一覧';" value="観光地一覧"　span style="color:#0000ff;"></th>
        <th><input type="button" onClick="location.href = 'お気に入り';" value="Myお気に入り"　span style="color:#0000ff;"></th>
        <th><input type="button" onClick="location.href = 'アルバム';" value="アルバム"　span style="color:#0000ff;"></th></tr>
      </center>
    </body>
    </html>
