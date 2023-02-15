<?php
//URLからの接続禁止
$referer = $_SERVER['HTTP_REFERER'];
$url = "contact.php";
if (!strstr($referer, $url)) {
    header("Location: contact.php");
    exit;
}

//DB接続
function db_open() :PDO{
    $db='mysql:dbname=cafe;host=localhost;charset=utf8';
    $db_user='root';
    $db_password='Sandar1125';
    $db_opt=[
        PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES=>false,
        ];
        $dbh = new PDO($db,$db_user,$db_password,$db_opt);
        return $dbh;
    }

try {
    $dbh = db_open();
    $stmt = $dbh->prepare('DELETE FROM contacts WHERE id = :id');

    $stmt->execute(array(':id' => $_GET["id"]));

    echo "削除しました。";
} catch (Exception $e) {
    echo 'エラーが発生しました。:' . $e->getMessage();
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>cafe-cafe DB 削除完了</title>
</head>

<body>
    <p>
    <a href="contact.php">お問い合わせ一覧へ</a>
    </p>
</body>

</html>