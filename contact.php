<?php

session_start();
$user = 'root';
$pass = 'Sandar1125';
$dsn  = 'mysql:host=localhost;dbname=cafe';
function redirect()
{
    if (empty($_SERVER["HTTP_REFERER"])) {
        header("Location: contact.php");
        exit();
    }
}
redirect();

// 変数の初期化
$page_flag = 0;
$clean = array();
$error = array();

if( !empty($_POST) ) {
	foreach( $_POST as $key => $value ) {
		$clean[$key] = htmlspecialchars( $value, ENT_QUOTES);
	} 
}

if( !empty($clean['send_btn']) ) {
    $error = validation($clean);
	if( empty($error) ) { 
        $page_flag = 1; }
} elseif( !empty($clean['btn_submit']) ) {	
	$page_flag = 2;
}

function validation($data) {

	$error = array();

	if( empty($data["fullname"]) ) {
		$error[] = "氏名は必ず入力してください。";
	}elseif( 10 < mb_strlen($data["fullname"]) ) {
		$error[] = "氏名は10文字以内で正しく入力してください。";
	}
    if( empty($data["kana"]) ) {
        $error[] = "フリガナは必ず入力してください。";
    }elseif( 10 < mb_strlen($data["kana"]) ) {
		$error[] = "フリガナは10文字以内で正しく入力してください。";
	}
    if(empty($data["tel"])){
        true;
        //必須ではない為
    }elseif(!preg_match('/^[0-9]+$/',$data["tel"])){
        //preg_match 正規表現によるマッチングを行う
        //!preg_match('/^[0-9]+$/'),$data['tel']は半角数字のみ
        //電話番号等、半角数字以外の入力を禁止したい場合に利用できるバリデーションチェック
        $error[] = "電話番号は正しい形式で入力してください。";
    }
    if( empty($data["email"]) ) {
        $error[] = "メールアドレスは必ず入力してください。 ";
    }elseif( !preg_match( "/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/iD", $data["email"]) ) {
        $error[] = "メールアドレスは正しい形式で入力してください。";
    }
    if( empty($data["body"]) ) {
        $error[] = "お問い合わせ内容は必ず入力してください。 ";
    }elseif( 500 < mb_strlen($data["body"]) ) {
		$error[] = "お問い合わせ内容は500文字以内で入力してください。 ";
	}
	return $error;
}
?>

<?php

$dbh = new PDO($dsn, $user, $pass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>cafe-cafe DB</title>
    <link rel="stylesheet" type="text/css" href="style.css" >
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="cafeDB.js"></script>
</head>

<body>
    <header class="header-main">
        <div class="cafe-cafe-header" style="background-color:rgba(0,0,0,0.8);height:4rem;padding-top:0;top:0;"> 
            <h1 style="padding: 0 5%;"><a href="index.php"><img class="cafe-cafe" src="img/logo.png" alt="ヘッダー ロゴ"></a></h1>
            <ul class="header-flex" style="width:100%;padding-top:30px;">
                <li><a href="index.php">はじめに</a></li>
                <li><a href="index.php">体験</a></li>
                <li><a href="contact.php">お問い合わせ</a></li>
                <li id="sign-in"><button id="signin-button" class="signin-button">サインイン</button></li>
            </ul>  
            <!-- ハンバーガーメニュー -->
            <div class="hamburger-main">
                <img class="hamburger-img" id="hamburger-img" src="img/menu.png" alt="" style="margin-top:0;padding:0.3rem 2rem 0 0;">
                <div class="hamburger-header"> 
                    <div class="hamburger-menu" id="hamburger-menu" style="margin-top: 4rem;margin-right:0;">
                            <li class="hamburger-in" id="sign-in"><button id="signin-button" class="signin-button">サインイン</button></li>
                            <li class="border"></li>
                            <li><a href="index.php">はじめに</a></li>
                            <li><a href="index.php">体験</a></li>
                            <li><a href="contact.php">お問い合わせ</a></li>
                    </div>
                </div>   
            </div>     
        </div>
    </header>

    <!-- ログイン画面 -->
    <section id="login-main">
        <div id="login-box" class="login-box">
            <h3>ログイン</h3>
            <div class="border-login"></div>
            <div class="login-form">
                <input type="text" class="email" placeholder="メールアドレス"><br>
                <input type="text" class="password" placeholder="パスワード"><br>
                <button type="submit">送信</button><br>
            </div>
            <div class="border-login-s"></div>
            <div class="sns">
                <a href="#"><img class="twitter" src="img/twitter.png" alt="ロゴ"></a><br>
                <a href="#"><img class="facebook" src="img/fb.png" alt="ロゴ"></a><br>
                <a href="#"><img class="google" src="img/google.png" alt="ロゴ"></a><br>
                <a href="#"><img class="apple" src="img/apple.png" alt="ロゴ"></a><br>
            </div>
        </div>
    </section>

    <section>
        <!--確認画面-->
        <?php if( $page_flag === 1 ): ?>
        <div class="contact-box">
            <h2>お問い合わせ</h2>
            <form action="" method="post">
                <p class="c-text">
                    下記の内容をご確認の上送信ボタンを押してください<br>
                    内容を訂正する場合は戻るを押してください。
                </p>

                <dl class="confirm">
                    <dt><label for="name">氏名<font color="red">*</font></label></dt>
                    <dd>
                        <p class="ditail"><?php echo htmlspecialchars($_POST["fullname"], ENT_QUOTES, "UTF-8"); ?></p>
                    </dd>

                    <dt><label for="kana">フリガナ<font color="red">*</font></label></dt>
                    <dd>
                        <p class="ditail"><?php echo htmlspecialchars($_POST["kana"], ENT_QUOTES, "UTF-8"); ?></p>
                    </dd>

                    <dt><label for="tel">電話番号<font color="red">*</font></label></dt>
                    <dd>
                        <p class="ditail"><?php echo htmlspecialchars($_POST["tel"], ENT_QUOTES, "UTF-8"); ?></p>
                    </dd>

                    <dt><label for="mail">メールアドレス<font color="red">*</font></label></dt>
                    <dd>
                        <p class="ditail"><?php echo htmlspecialchars($_POST["email"], ENT_QUOTES, "UTF-8"); ?></p>
                    </dd>
                </dl>
                <h3><label for="body">お問い合わせ内容をご記入ください<font color="red">*</font></label></h3>
                <dl class="body">
                    <dd>
                        <p class="ditail">
                            <!--文字化け-->
                            <?php echo  nl2br($_POST["body"]); ?>
                        </p>
                    </dd>
                </dl>
                <div class="confirm-btn">
                    <input class="send" name="btn_submit" type="submit" value="送信">
                    <input class="back" name="btn_back" type="submit" value="戻る">       
                </div>
                <input type="hidden" name="fullname" value="<?php echo $_POST["fullname"]; ?>">
                <input type="hidden" name="kana" value="<?php echo $_POST["kana"]; ?>">
                <input type="hidden" name="tel" value="<?php echo $_POST["tel"]; ?>">
                <input type="hidden" name="email" value="<?php echo $_POST["email"]; ?>">
                <input type="hidden" name="body" value="<?php echo $_POST["body"]; ?>">
            </form>
        </div>

        <!--完了画面-->
        <?php elseif( $page_flag === 2 ): ?>
        <div class="contact-box">
            <h2>お問い合わせ</h2>
            <form action="" method="post">
                <p>
                    お問い合わせ頂きありがとうございます。<br>
                    送信頂いた件につきましては、当社より折り返しご連絡を差し上げます。<br>
                    なお、ご連絡までに、お時間を頂く場合もございますので予めご了承ください。
                </p>

            <a href="index.php">トップへ戻る</a>
            </form>
        </div>
        <!--入力画面-->
        <?php else: ?>
            <?php if( !empty($error) ): ?>       
        <?php endif; ?> 
        <div class="contact-box">
            <h2>お問い合わせ</h2>
            <form action="" method="post" class="validation">
                <h3>下記の項目をご記入の上送信ボタンを押してください</h3>
                <p class="c-text">
                    送信頂いた件につきましては、当社より折り返しご連絡を差し上げます。<br>
                    なお、ご連絡までに、お時間を頂く場合もございますので予めご了承ください。<br>
                    <font color="red">*</font>は必須項目となります。
                </p>
                <!-- エラー表示 -->
                <div class="err-msg-name">
                    <ul class="error_list">
                        <?php foreach( $error as $value ): ?>
                            <li><?php echo $value; ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <dl>
                    <dt><label for="name">氏名<font color="red">*</font></label></dt>
                    <dd>
                        <input type="text" name="fullname" id="fullname" value="<?php if( !empty($_POST['fullname']) ){ echo $_POST['fullname']; } ?>" placeholder="山田太郎">
                    </dd>

                    <dt><label for="kana">フリガナ<font color="red">*</font></label></dt>
                    <dd>
                        <input type="text" name="kana" id="kana" value="<?php if( !empty($_POST['kana']) ){ echo $_POST['kana']; } ?>" placeholder="ヤマダタロウ">
                    </dd>

                    <dt><label for="tel">電話番号</label></dt>
                    <dd>
                        <input type="text" name="tel" id="tel" value="<?php if( !empty($_POST['tel']) ){ echo $_POST['tel']; } ?>" placeholder="08012345678">
                    </dd>

                    <dt><label for="email">メールアドレス<font color="red">*</font></label></dt>
                    <dd>
                        <input type="text" name="email" id="mail" value="<?php if( !empty($_POST['email']) ){ echo $_POST['email']; } ?>" placeholder="test@test.jp">
                    </dd>
                </dl>
                <h3><label for="mail">お問い合わせ内容をご記入ください<font color="red">*</font></label></h3>
                <dl class="body">
                    <dd>
                        <textarea name="body" id="body"><?php if( !empty($_POST['body']) ){ echo $_POST['body']; } ?></textarea>
                    </dd>
                </dl>
                <div class="btn">
                    <input class="send_btn" name="send_btn" type="submit" value="送信">
                </div>
            </form>
        </div>
    </section>


    <section>
        <table>
            <tr>
                <th class="boder-right">システムID</th>
                <th class="boder-right">氏名</th>
                <th class="boder-right">フリガナ</th>
                <th class="boder-right">電話番号</th>
                <th class="boder-right">メールアドレス</th>
                <th class="boder-right">お問い合わせ</th>
                <th>送信日時</th>
            </tr>
            <?php
            foreach($rows as $row){
            ?>

            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['name'] ?></td>
                <td><?= $row['kana'] ?></td>
                <td><?= $row['tel'] ?></td>
                <td><?= $row['email'] ?></td>
                <td><?= nl2br($row['body']) ?></td>
                <td><?= $row['created_at'] ?></td>
                <td><a href="edit.php? id=<?php echo (int)$row['id']; ?>">編集</a></th>
                <td><a href="delete.php? id=<?php echo (int) $row['id']; ?>" onclick="return confirm('本当に削除しますか？')">削除</a></td>
            </tr>
            <?php
            }
            ?>
        </table>
    </section>
        <?php endif; ?>

    <!--footer-->
    <?php include "footer.php" ?>
    <!--footer-->

</body>
</html>