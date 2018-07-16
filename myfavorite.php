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
  <title>myお気に入り</title>
</head>
<body>
  <Div Align="left">
    <article>
      <h1>留学生用岩手観光支援システム</h1>
    </article>
  </Div>
  <Div Align="right">
    <article>
      <legend>ようこそ<?php echo htmlspecialchars($_SESSION["NAME"], ENT_QUOTES); ?>さん</legend>
      <li><a href="logout.php">ログアウト</a></li>
    </article>
    <center>
      <h1>myお気に入り</h1>
      <Div Align="right">
        <form action="" method="get">
          <legend>観光地検索</legend>
          <input type="text" name="search" value="<?php echo $search_value ?>"><input type="submit" name="" value="検索">
        </form>
      </Div>
      <table border="1">
        <tr><th><input type="button" onClick="location.href = 'top.php';" value="ホーム"　span style="color:#0000ff;"></th>
          <th><input type="button" onClick="location.href = 'spots.php';" value="観光地一覧"　span style="color:#0000ff;"></th>
          <th><input type="button" onClick="location.href = 'favorite.php';" value="Myお気に入り"　span style="color:#0000ff;"></th></tr>
        </table>
        <h1>Myお気に入り一覧</h1>
      </center>
    </body>
    </html>
