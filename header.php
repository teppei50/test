<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <title>cafe-cafe</title>
    <link rel="stylesheet" href="style.css" >
</head>
<body>
<header class="header-main">
    <div class="cafe-cafe-header" id="cafe-cafe-header"> 
        <h1><a href="#"><img class="cafe-cafe" id="cafe-cafe" src="img/logo.png" alt="ヘッダー ロゴ"></a></h1>
        <ul class="header-flex" id="header-flex">
            <li><a href="#hajimeni">はじめに</a></li>
            <li><a href="#experience-top">体験</a></li>
            <li><a href="contact.php">お問い合わせ</a></li>
            <li id="sign-in"><button id="signin-button" class="signin-button">サインイン</button></li>
        </ul>    
        <!-- ハンバーガーメニュー -->
        <div class="hamburger-main">
            <img class="hamburger-img" id="hamburger-img" src="img/menu.png" alt="">
            <div class="hamburger-header"> 
                <div class="hamburger-menu" id="hamburger-menu">
                        <li class="hamburger-in" id="sign-in"><button id="signin-button" class="signin-button">サインイン</button></li>
                        <li class="border"></li>
                        <li><a href="#hajimeni">はじめに</a></li>
                        <li><a href="#experience-top">体験</a></li>
                        <li><a href="contact.php">お問い合わせ</a></li>
                </div> 
            </div>       
        </div>
        
    </div>
</header>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="cafe.js"></script>
</body>
</html>