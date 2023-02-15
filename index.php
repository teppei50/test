
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cafe-cafe DB</title>
    <link rel="stylesheet" type="text/css" href="style.css" >
</head>
<body>
    <div class="corona"><a href="#">新型コロナに対する取り組みの最新情報をご案内</a></div>
    <div class="home">   
        <!-- ヘッダー読み込み -->
        <?php include 'header.php' ?>
        <h1 class="concept">あなたの<br>好きな空間を作る。</h1>
    </div>
    


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

<!-- 各エリア -->
<a name="hajimeni"></a>
<div class="prefecture">
    <img src="img/cafe1.jpg" alt="東京" class="tokyo"><div class="place"><p>東京<br>車で15分</p></div>
    <img src="img/cafe2.jpg" alt="神奈川" class="kanagawa"><div class="place"><p>神奈川<br>車で30分</p></div>
    <img src="img/cafe3.jpg" alt="愛知" class="aichi"><div class="place"><p>愛知<br>車で1時間</p></div>
    <img src="img/cafe4.jpg" alt="京都" class="kyoto"><div class="place"><p>京都<br>車で40分</p></div>
    <img src="img/cafe5.jpg" alt="岡山" class="okayama"><div class="place"><p>岡山<br>車で1.5時間</p></div>
    <img src="img/cafe6.jpg" alt="鹿児島" class="kagoshima"><div class="place"><p>鹿児島<br>車で50分</p></div>
    <img src="img/cafe7.jpg" alt="沖縄" class="okinawa"><div class="place"><p>沖縄<br>車で2時間</p></div>
</div>
<div class="location-title">
    <h1>好きなロケーションを選ぼう</h1>
</div>
<section class="favorite-location">
    <div class="location-block">
        <div class="location-in-the-block">
            <div class="location-img"><img src="img/intro1.jpg" alt="クラシック 画像"></div>
            <div class="location-info">
                <p>クラシック</p>
            </div>
        </div>
    </div>
    <div class="location-block">
        <div class="location-in-the-block">
            <div class="location-img"><img src="img/intro2.jpg" alt="バー 画像"></div>
            <div class="location-info">
                <p>バー</p>
            </div>
        </div>
    </div>
    <div class="location-block">
        <div class="location-in-the-block">
            <div class="location-img"><img src="img/intro3.jpg" alt="キャンプ 画像"></div>
            <div class="location-info">
                <p>キャンプ</p>
            </div>
        </div>
    </div>
    <div class="location-block">
        <div class="location-in-the-block">
            <div class="location-img"><img src="img/intro4.jpg" alt="リゾート 画像"></div>
            <div class="location-info">
                <p>リゾート</p>
            </div>
        </div>
    </div>
</section>

<button id="top-button" class="top-button">Jump To Top</button>
<!-- Go To Eats -->
<section>
    <div class="goto">
        <img src="img/goto.jpg" alt="Go To Eats 画像">
        <div class="goto-text">
            <h1>Go To Eats</h1>
            <p>キャンペーンを利用して、全国で食事をしよう。<br>いつもと違う景色に囲まれてカラダもココロもリフレッシュ。</p>
        </div>
    </div>
</section>

<section class="cafe-making-experience">
    <div class="experience-margin">
        <a name="experience-top"></a>
        <h2 class="experience-title">カフェ作りを体験しよう</h2>
        <p class="experience-sub-title">お店のエキスパートが案内するユニークな体験(直接対面型またはオンライン)。</p>
        <div class="experience-flex">
            <div class="experience-block">
                <div class="experience-in-the-block">
                    <div class="experience-img"><img src="img/exp1.jpg" alt="ジョブ体験 画像"></div>
                    <div class="experience-info">
                        <h3>ジョブ体験</h3>
                        <p>カフェカウンターを体験しよう。</p>
                    </div>
                </div>
            </div>
            <div class="experience-block">
                <div class="experience-in-the-block">
                    <div class="experience-img"><img src="img/exp2.jpg" alt="レシピ体験 画像"></div>
                    <div class="experience-info">
                        <h3>レシピ体験</h3>
                        <p>美味しいレシピを考えてみよう。</p>
                    </div>
                </div>
            </div>
            <div class="experience-block">
                <div class="experience-in-the-block">
                    <div class="experience-img"><img src="img/exp3.jpg" alt="プロモーション体験 画像"></div>
                    <div class="experience-info">
                        <h3>プロモーション体験</h3>
                        <p>お店の宣伝を手伝ってみよう。</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="joining-main">
    <h2>全国のホストに仲間入りしよう</h2>
    <div class="joining-flex">
        <div class="joining-block">
            <div class="joining-in-the-block">
                <div class="joining-img"><img src="img/host1.jpg" alt="ビジネス 画像"></div>
                <div class="joining-info">
                    <p>ビジネス</p>
                </div>
            </div>
        </div>
        <div class="joining-block">
            <div class="joining-in-the-block">
                <div class="joining-img"><img src="img/host2.jpg" alt="コミュニティ 画像"></div>
                <div class="joining-info">
                    <p>コミュニティ</p>
                </div>
            </div>
        </div>
        <div class="joining-block">
            <div class="joining-in-the-block">
                <div class="joining-img"><img src="img/host3.jpg" alt="食べ歩き 画像"></div>
                <div class="joining-info">
                    <p>食べ歩き</p>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include 'footer.php' ?>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="cafeDB.js"></script>
<script src="scroll.js"></script>
</body>
</html>