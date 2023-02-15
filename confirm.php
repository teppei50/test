<?php
$referer = $_SERVER["HTTP_REFERER"];
$url = 'http://localhost/4-4%20cafe/contact.php';
if(!strstr($referer,$url)){
  header('Location: http://localhost/4-4%20cafe/contact.php');
  exit;
}
?>
<?php
if($_SERVER["REQUEST_METHOD"] != "POST"){
    header("Location: index.php");
    exit();
}

$name = $_POST['name'];
$kana = $_POST['kana'];
$tel = $_POST['tel'];
$email = $_POST['email'];
$body = htmlspecialchars($_POST['body'], ENT_QUOTES, "UTF-8");

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
        <form class="contact_form" action="#" method="post">
            <p>下記の内容をご確認の上送信ボタンを押してください。<br>
            内容を訂正する場合は戻るを押してください。</p>
            <div class="contact_content">
                <dt>氏名</dt>
                    <dd><?php echo $name;?></dd>
                <dt>フリガナ</dt>
                    <dd><?php echo $kana;?></dd>
                <dt>電話番号</dt>
                <dd><?php echo $tel;?></dd>
                <dt>メールアドレス</dt>
                <dd><?php echo $email;?></dd>
                <dt>お問い合わせ内容</dt>
                <dd><?php echo nl2br($body);?></dd>
            </div>
            <div class="confirm_button">
            <a href="complete.php" class="confirm_send">送　信</a>
            <a href="javascript:history.back();">戻　る</a>
                <div class="test"></div>
            </div>

            <div class="contact_content">
	 		<input type="hidden" name="name" value="<?php echo $name;?>">
	 		<input type="hidden" name="kana" value="<?php echo $kana;?>">
	 		<input type="hidden" name="tel" value="<?php echo $tel;?>">
	 		<input type="hidden" name="email" value="<?php echo $email;?>">
	 		<input type="hidden" name="body" id="body" value="<?php echo $body;?>">
            
	 	    </dl>
        </form>
    </div>
    </section>

    <script src="index.js"></script>

</body>
</html>

<?php include('./footer.php'); ?>

