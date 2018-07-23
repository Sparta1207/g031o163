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
  <title>観光地一覧</title>
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
  </Div>
  <center>
    <h1>観光地一覧</h1>
    <table border="1">
      <tr><th><input type="button" onClick="location.href = 'top.php';" value="ホーム"　span style="color:#0000ff;"></th>
        <th><input type="button" onClick="location.href = 'spots.php';" value="観光地一覧"　span style="color:#0000ff;"></th>
        <th><input type="button" onClick="location.href = 'myfavorite.php';" value="Myお気に入り"　span style="color:#0000ff;"></th></tr>
      </table>
    </center>
    <table border = "0">
      <tr>
        <td><img src="mtiwate.jpg" wight="200" height="150"></td>
        <td><img src="koiwai.jpg" wight="200" height="150"></td>
        <td><img src="ipponsakura.jpg" wight="200" height="150"></td>
      </tr>
      <tr>
        <td><a href="mtiwate.php">岩手山</a></td>
        <td><a href="koiwai.php">小岩井</a></td>
        <td><a href="ipponsakura.php">一本桜</a></td>
      </tr>
      <tr>
        <td>岩手山は.....</td>
        <td>小岩井は.....</td>
        <td>一本桜は.....</td>
      </tr>
      </table>
  </body>
  </html>

<Div Align="right">
  <div id="google_translate_element"></div><script type="text/javascript">
  function googleTranslateElementInit() {
    new google.translate.TranslateElement({pageLanguage: 'ja', includedLanguages: 'en,ja,zh-CN', layout: google.translate.TranslateElement.FloatPosition.BOTTOM_RIGHT}, 'google_translate_element');
  }
  </script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</div>
