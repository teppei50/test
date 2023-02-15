<?php
$referer = $_SERVER["HTTP_REFERER"];
$url = 'http://localhost/4-4%20cafe/confirm.php';
if(!strstr($referer,$url)){
  header('Location: http://localhost/4-4%20cafe/contact.php');
  exit;
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,minimum-scale=1.0">
    <title>確認画面</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

</head>

<body>

    <header style="background:none; min-height:50px;">
        <nav class style="background:#000000;">
            <div class="logo">
                <a href="index.php">
                    <img src="img/logo.png" alt="Cafe">
                </a>
            </div>
            <div class="g_nav">
                <div class="menu_click1">はじめに</div>
                <div class="menu_click2">体験</div>
                <div class="menu">
                    <a href="contact.html">お問い合わせ</a>
                </div>
            </div>
            <div class="sign">
                <div class="signin_click" id="signin_click">サインイン</div>
                <div class="hamburger">
                <img src="img/menu.png" alt="メニュー" align="right">
                </div>
            </div>
            <div class="sp_nav">
                <div class="sp_signin_click">サインイン</div>
                <div class="sp_menu_click1">はじめに</div>
                <div class="sp_menu_click2">体験</div>
                <div class="menu">
                    <a href="contact.html">お問い合わせ</a>
                </div>
            </div>
        </nav>
    </header>

<section>
    <div class="contact">
        <h2>お問い合わせ</h2>
        <div class="complete_text">
        <p>お問い合わせ頂きありがとうございます。<br>
        送信頂いた件につきましては、当社より折り返しご連絡を差し上げます。<br>
        なお、ご連絡までに、お時間を頂く場合もございますので予めご了承ください。</p>
        <a href="index.php">トップへ戻る</a>
    </div>
</section>
</body>
</html>

<?php include('./footer.php'); ?>