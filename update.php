<?php

session_start();
$_SESSION = array();
session_destroy();

use cafe\db;

require_once('db.php');


unset($_SESSION['error_name'], $_SESSION['error_kana'], $_SESSION['error_tel'], $_SESSION['error_email'], $_SESSION['error_body']);


if (($_POST["name"]) == "") {
  $_SESSION["error_name"] = htmlspecialchars("氏名は必須項目です。", ENT_QUOTES);
  unset($_SESSION["name"]);
} else if (mb_strlen($_POST["name"]) > 11) {
  $_SESSION["error_name"] = htmlspecialchars("氏名は10文字以内でお願いします。", ENT_QUOTES);
  unset($_SESSION["name"]);
} else {
  $_SESSION["name"] = htmlspecialchars($_POST["name"], ENT_QUOTES);
}


if (($_POST["kana"]) == "") {
  $_SESSION["error_kana"] = htmlspecialchars("フリガナは必須項目です。", ENT_QUOTES);
  unset($_SESSION["kana"]);
} else if (mb_strlen($_POST["kana"]) > 11) {
  $_SESSION["error_kana"] = htmlspecialchars("フリガナは10文字以内でお願いします。", ENT_QUOTES);
  unset($_SESSION["kana"]);
} else {
  $_SESSION["kana"] = htmlspecialchars($_POST["kana"], ENT_QUOTES);
}


if (is_numeric($_POST["tel"]) || !($_POST["tel"])) {
  $_SESSION["tel"] = htmlspecialchars($_POST["tel"], ENT_QUOTES);
} else if (($_POST["tel"]) == "") {
  $_SESSION["error_tel"] = htmlspecialchars("電話番号は必須です。", ENT_QUOTES);
  unset($_SESSION["tel"]);
} else {
  $_SESSION["error_tel"] = htmlspecialchars("電話番号の入力値が誤りです。", ENT_QUOTES);
  unset($_SESSION["tel"]);
}


if (($_POST["email"]) == "") {
  $_SESSION["error_email"] = htmlspecialchars("メールアドレスは必須項目です。", ENT_QUOTES);
  unset($_SESSION["email"]);
} else if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
  $_SESSION["error_email"] = htmlspecialchars("メールアドレスの入力値が誤りです。", ENT_QUOTES);
  unset($_SESSION["email"]);
} else {
  $_SESSION["email"] = htmlspecialchars($_POST["email"], ENT_QUOTES);
}


if (($_POST["body"]) == "") {
  $_SESSION["error_body"] = htmlspecialchars("お問合せ内容は必須項目です。", ENT_QUOTES, "UTF-8");
  unset($_SESSION["body"]);
} else {
  $_SESSION["body"] = htmlspecialchars($_POST["body"], ENT_QUOTES, "UTF-8");
}


if ($_SERVER["REQUEST_METHOD"] != "POST") {
  header("Location:../contact/contact.php");
  exit();
}



$dbh = db\dbconnect();

$dbh->beginTransaction();


$id = $_POST['id'];
$name = $_POST['name'];
$kana = $_POST['kana'];
$tel = $_POST['tel'];
$email = $_POST['email'];
$body = $_POST['body'];


$sql = "UPDATE contacts SET name = :name, kana = :kana, tel = :tel, email = :email, body = :body, created_at = now() WHERE id = :id";


$stmt = $dbh->prepare($sql);


$stmt->bindParam(':name', $name, PDO::PARAM_STR);
$stmt->bindParam(':kana', $kana, PDO::PARAM_STR);
$stmt->bindParam(':tel', $tel, PDO::PARAM_STR);
$stmt->bindParam(':email', $email, PDO::PARAM_STR);
$stmt->bindParam(':body', $body, PDO::PARAM_STR);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);


$stmt->execute();




$sql = "SELECT * FROM contacts WHERE id = :id";


$stmt = $dbh->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);


$stmt->execute();


$user = array();
foreach ($stmt as $row) {
  $user[] = $row;
}

$dbh->commit();


$dbh = null;


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../contact/style-contact.css">
  <title>更新</title>
</head>

<body>
  <?php if (
    !isset($_SESSION["error_name"]) && !isset($_SESSION["error_kana"]) &&
    !isset($_SESSION["error_tel"]) && !isset($_SESSION["error_email"]) &&
    !isset($_SESSION["error_body"])
  ) {
  ?>

    <div id=conmain>
      <div class="table">
        <h1>編集完了</h1>
        <h3>idが<?php echo $id ?>のテーブルが下記のように更新されました</h3>
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
        </table>
      </div>

    <?php } else {
    header("Location:edit.php?id=$id");
  } ?>
    <a href="contact.php" class=topretune onclick="return('<?php unset($_SESSION); ?>')">問い合わせTOPへ</a>
    </div>
</body>

</html>