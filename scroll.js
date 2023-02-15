
// スクロールでtopに戻るボタン表示
$(function (){

    // スクロールされると処理
    $(window).on('scroll',function(){
        // 最も上に表示されているコンテンツの距離が650以上になったらTRUE
        if($(this).scrollTop() > 650) {
        // .cafe-cafe-header2 classにopacity: 1; 付与
            $(".top-button").css({opacity: '1'});
        // それ以外はFALSE
        } else {		
            // .cafe-cafe-header2　classに　opacity: 0;　を付与
            $(".top-button").css({opacity: "0"},);
        }
		// クリックしたらトップに戻る
		// 変数を定義
		const top_btn = document.querySelector('#top-button');
		// クリックすると処理
        top_btn.addEventListener('click',() => {
			window.scrollTo({top: 0,behavior: "smooth"});
        });
    });
});

// スクロールでメニュー表示
$(function (){
	
    // スクロールされると処理
    $(window).on('scroll',function(){
        // 最も上に表示されているコンテンツの距離が50以上になったらTRUE
        if($(this).scrollTop() > 50) {
            $("#cafe-cafe-header").addClass('change');
			$("#cafe-cafe").addClass('move');
			$("#hamburger-img").addClass('hmove');
			$("#header-flex").addClass('fmove');
        } else {		
            $("#cafe-cafe-header").removeClass('change');
			$("#cafe-cafe").removeClass('move');
			$("#hamburger-img").removeClass('hmove');
			$("#header-flex").removeClass('fmove');
        }
    });
});
