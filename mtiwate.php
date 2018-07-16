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
  <title>岩手山</title>
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
      <h1>岩手山</h1>
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
      </center>
      <Div Align="left">
        <table border = "0">
          <tr>
            <td><input type="button" onClick="location.href = 'myfavorite.php';" value="お気に入り登録"　span style="color:#0000ff;"></td>
          </tr>
          <tr>
            <td><img src="mtiwate.jpg" wight="500" height="400"></td>
            <td>岩手山（いわてさん）は日本の東北地方、奥羽山脈北部にあり二つの外輪山からなる標高2,038mの成層火山。岩手県の最高峰であり、県のシンボルの一つとされている。日本百名山に選定されている。</td>
          </tr>
        </table>
        <table border="1">
          <tr>
            <th>営業時間</th><td>終日営業</td>
          </tr>
          <tr>
            <th>所在地</th><td>岩手県八幡平市・滝沢市・雫石町</td>
          </tr>
          <tr>
            <th>アクセス</th>
            <td><table border = "1">
              <tr>
                <th>東北縦貫自動車道</th><th>IGRいわて銀河鉄道</th><th>滝沢駅周辺タクシー会社</th>
              </tr>
              <tr>
                <td>【滝沢IC】→約15分・約8キロメートル→【馬返し】</td><td>【滝沢駅】→（タクシー）約20分・約11キロメートル→【馬返し】</td><td>滝沢交通：019-694-3277・みたけタクシー：019-688-1335</td>
              </tr>
            </td>
          </tr>
        </table>
      </table><br>
          <h1>レビュー</h1>
    </Div>
  </body>
  </html>
