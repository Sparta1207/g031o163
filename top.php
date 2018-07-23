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
  <title>ホーム</title>
</head>
<body>
  <Div Align="left">
    <article>
      <h1>留学生用岩手観光支援システム</h1>
    </article>
  </Div>
  <Div Align="right">
    <article>
      <legend><?php echo htmlspecialchars($_SESSION["NAME"], ENT_QUOTES); ?>さんがログイン中<</legend>
      <li><a href="logout.php">ログアウト</a></li>
    </article>
    <center>
      <h1>ホーム</h1>
      <table border="1">
        <tr><th><input type="button" onClick="location.href = 'top.php';" value="ホーム"　span style="color:#0000ff;"></th>
          <th><input type="button" onClick="location.href = 'spots.php';" value="観光地一覧"　span style="color:#0000ff;"></th>
          <th><input type="button" onClick="location.href = 'myfavorite.php';" value="Myお気に入り"　span style="color:#0000ff;"></th></tr>
        </table>
        <img src="1.jpg" border="1" width="300" height="500">
      </center>
    </body>
    </html>

      <div id="google_translate_element"></div><script type="text/javascript">
      function googleTranslateElementInit() {
        new google.translate.TranslateElement({pageLanguage: 'ja', includedLanguages: 'en,ja,zh-CN', layout: google.translate.TranslateElement.FloatPosition.BOTTOM_RIGHT}, 'google_translate_element');
      }
      </script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
