<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,minimum-scale=1.0">
    <title>お問い合わせ</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

</head>

<body>

<header style="background:none; min-height:70px;">
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
    <form class="contact_form" id="form" action="confirm.php" method="post" name="form1" onSubmit="return check()">
        <h3>下記の項目をご記入の上送信ボタンを押してください</h3>
        <p>送信頂いた件につきましては、当社より折り返しご連絡を差し上げます。<br>
        なお、ご連絡までに、お時間を頂く場合もございますので予めご了承ください。<br>
        <span class="required">*</span>は必須項目となります。</p>
        <div class="contact_content">
            <label for="name">氏名</label><span class="required">*</span>
                <input type="text" name="name" id="name" placeholder="山田太郎" required pattern=.{1,10} title="10文字以内で入力して下さい">
            <label for="kana">フリガナ</label><span class="required">*</span>
                <input type="text" name="kana" placeholder="ヤマダタロウ" required pattern=.{1,10} title="10文字以内で入力して下さい">
            <label for="tel">電話番号</label>
                <input type="text" name="tel" placeholder="09012345678" pattern=\d title="数字(0-9)で入力して下さい">
            <label for="email">メールアドレス</label>
                <input type="email" name="email" placeholder="メールアドレス" required pattern=.+@.+\..+ title="正しいメールアドレスの形式で入力して下さい">
        </div>
        <h3>お問合せ内容をご記入ください<span class="required">*</span></h3>
        <div class="contact_content">
            <textarea name="body" id="body" required ></textarea>
            <input type="submit" id="button" value="送　信"><br>
        </div>
    </form>
</div>
</section>

<script src="index.js"></script>

</body>
</html>

<?php include('./footer.php'); ?>