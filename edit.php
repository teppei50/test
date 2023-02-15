<?php
session_start();

use cafe\db;


if ($_SERVER["REQUEST_METHOD"] != "GET") {
  header("Location:contact.php");
  exit();
}


$id = $_GET['id'];

require_once('db.php');

$dbh = db\dbconnect();


$sql = "SELECT * FROM contacts WHERE id = :id";


$stmt = $dbh->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);


$stmt->execute();


foreach ($stmt as $row) {
  $user[] = $row;
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style-hensyu.css">
  <title>編集ページ</title>

  <script>
    window.onload = function() {
      const submit = document.getElementById('submit');
      const name = document.getElementById('name');
      const kana = document.getElementById('kana');
      const tel = document.getElementById('tel');
      const email = document.getElementById('email');
      const body = document.getElementById('body');
      const reg = /^[A-Za-z0-9]{1}[A-Za-z0-9_.-]*@{1}[A-Za-z0-9_.-]{1,}.[A-Za-z0-9]{1,}$/;
      const num = /^[0-9]*$/;

      submit.addEventListener('click', function(event) {
        let message = [];

        if (name.value == "") {
          message.push("氏名は必須項目です。\n");
        } else if (name.value.trim().length > 11) {
          message.push("氏名は10文字以内でお願いします。\n");
        }


        if (kana.value == "") {
          message.push("フリガナは必須項目です。\n");
        } else if (kana.value.trim().length > 11) {
          message.push("フリガナは10文字以内でお願いします。\n");
        }


        if (tel.value == "") {
          message.push("電話番号は必須項目です。\n");
        } else if (!num.test(tel.value)) {
          message.push("電話番号の入力値が誤りです。\n");
        }


        if (email.value == "") {
          message.push("メールアドレスは必須項目です。\n");
        } else if (!reg.test(email.value)) {
          message.push("メールアドレスの入力値が誤りです。\n");
        }


        if (body.value == "") {
          message.push("お問合せ内容は必須項目です。\n");
        }


        if (message.length > 0) {
          var re = message.join("");
          alert(re);
          return;
        }
      });
    };
  </script>
</head>

<body>
  <html>

  <body>
    <div id=conmain>
      <h1>編集ページ</h1>
      <div class="table">
        <h3>idが<?php echo $id ?>のテーブルを表示しています。</h3>
        <table border=1>
          <tr>
            <td nowrap>システムID</td>
            <td nowrap>氏名</td>
            <td nowrap>フリガナ</td>
            <td nowrap>電話番号</td>
            <td nowrap>メールアドレス</td>
            <td nowrap>問い合わせ内容</td>
            <td nowrap>送信時間</td>
          </tr>
          <?php foreach ($user as $row) { ?>
            <tr>
              <td nowrap><?php echo htmlspecialchars($row['id']); ?></td>
              <td nowrap><?php echo htmlspecialchars($row['name']); ?></td>
              <td nowrap><?php echo htmlspecialchars($row['kana']); ?></td>
              <td nowrap><?php echo htmlspecialchars($row['tel']); ?></td>
              <td nowrap><?php echo htmlspecialchars($row['email']); ?></td>
              <td><?php echo nl2br(htmlspecialchars($row['body'])); ?></td>
              <td nowrap><?php echo htmlspecialchars($row['created_at']); ?></td>
            </tr>
          <?php } ?>
        </table><br>
      </div>
      <div class=contact>
        <div class=contitel>
          <p>編集してください</p>
        </div>
        <div class=conbox>
          <p class=guide>下記の項目をご記入の上更新ボタンを押してください</p>
          <form action="update.php" method="POST">
            <div class='inputValue'>
              <input type="hidden" id="id" name="id" value="<?php echo htmlspecialchars($row['id']); ?>">
              <div class=want>
                <p>氏名</p>
                <!---氏名エラーの出力--->
                <?php if (isset($_SESSION["error_name"])) {
                  echo '<font color="red">';
                  echo $_SESSION["error_name"];
                  echo '</font>';
                } ?>
                <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($row['name']); ?>">
              </div>
              <div class=want>
                <p>フリガナ</p>
                <?php if (isset($_SESSION["error_kana"])) {
                  echo '<font color="red">';
                  echo $_SESSION["error_kana"];
                  echo '</font>';
                } ?>
                <input type="text" id="kana" name="kana" value="<?php echo htmlspecialchars($row['kana']); ?>">
              </div>
              <div class=want>
                <p>電話番号</p>
                <?php if (isset($_SESSION["error_tel"])) {
                  echo '<font color="red">';
                  echo $_SESSION["error_tel"];
                  echo '</font>';
                } ?>
                <input type="text" id="tel" name="tel" value="<?php echo htmlspecialchars($row['tel']); ?>">
              </div>
              <div class=want>
                <p>メールアドレス</p>
                <?php if (isset($_SESSION["error_email"])) {
                  echo '<font color="red">';
                  echo $_SESSION["error_email"];
                  echo '</font>';
                } ?>
                <input type="text" id="email" name="email" value="<?php echo htmlspecialchars($row['email']); ?>">
              </div>
              <div class=conbox2>
                <p class=guide>問い合わせ内容</p>
                <?php if (isset($_SESSION["error_body"])) {
                  echo '<font color="red">';
                  echo $_SESSION["error_body"];
                  echo '</font>';
                } ?>
                <textarea name="body" id="body" rows="10"><?php echo htmlspecialchars($row['body']); ?></textarea>
              </div>
              <p>以上の内容でよければ更新ボタンを押してください。</p>
              <p>※更新した場合は送信した日時が更新した日時に上書きされます。</p>
              <input class="send" type="submit" id="submit" value="更新" onclick="update.php">
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>

  </html>