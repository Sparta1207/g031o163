<?php
session_start();
// ログイン状態チェック
if (!isset($_SESSION["NAME"])) {
  header("Location: Logout.php");
  exit;
}

$db['host'] = 'localhost';
$db['user'] = 'g031o163';
$db['pass'] = 'uJqY5ht6wacvacip';
$db['dbname'] = 'g031o163';

if ($mysqli->connect_errno) {
  printf("%s\n", $mysqli->connect_errno);
  exit();
}

$errorMessage = "";
$signUpMessage = "";

if (isset($_POST["Review"])) {
  if (empty($_POST["username"])) {  // 値が空のとき
    $errorMessage = '投稿者名が未入力です。';
  } else if (empty($_POST["spotname"])) {
    $errorMessage = '観光地名が未入力です。';
  } else if (empty($_POST["review"])) {
    $errorMessage = 'コメントが未入力です。';
  }

  if (!empty($_POST["username"]) && !empty($_POST["spotname"]) && !empty($_POST["review"])) {
    $username = $_POST["username"];
    $spotname = $_POST["spotname"];
    $review = $_POST["review"];

    $dsn = sprintf('mysql: host=%s; dbname=%s; charset=utf8', $db['host'], $db['dbname']);

    try {
      $pdo = new PDO($dsn, $db['user'], $db['pass'], array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
      $stmt = $pdo->prepare("INSERT INTO reviews (username, spotname, review) VALUES (?, ?, ?)");

      $signUpMessage = 'レビューを投稿しました。';
    } catch (PDOException $e) {
      $errorMessage = 'データベースエラー';
      // $e->getMessage() //でエラー内容を参照可能（デバッグ時のみ表示）
      // echo $e->getMessage();
    }
  }
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
      <legend><?php echo htmlspecialchars($_SESSION["NAME"], ENT_QUOTES); ?>さんがログイン中</legend>
      <li><a href="logout.php">ログアウト</a></li>
    </article>
    <center>
      <h1>岩手山</h1>
      <table border="1">
        <tr><th><input type="button" onClick="location.href = 'top.php';" value="ホーム"　span style="color:#0000ff;"></th>
          <th><input type="button" onClick="location.href = 'spots.php';" value="観光地一覧"　span style="color:#0000ff;"></th>
          <th><input type="button" onClick="location.href = 'myfavorite.php';" value="Myお気に入り"　span style="color:#0000ff;"></th></tr>
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
      <form id="review" name="review"　method = "POST" action = "">
        レビュー:<br />
        <label for="username">投稿者名</label><input type="text" id="username" name="username" placeholder="投稿者名を入力">
        <br>
        <label for="spotname">観光地名</label><input type="text" id="spotname" name="spotname"  placeholder="観光地名を入力">
        <br>
        <label for="review">コメント</label><input type="textarea" id="review" name="review"  placeholder="コメントを入力"　cols="50" rows="7">
        <br>
        <input type = "submit" id="Review" name = "Review" value = "投稿" />
      </form>
    </Div>
  </body>
  </html>


    <div id="google_translate_element"></div><script type="text/javascript">
    function googleTranslateElementInit() {
      new google.translate.TranslateElement({pageLanguage: 'ja', includedLanguages: 'en,ja,zh-CN', layout: google.translate.TranslateElement.FloatPosition.BOTTOM_RIGHT}, 'google_translate_element');
    }
    </script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
