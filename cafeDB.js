
// サインインクリックでログイン画面表示
$(function (){
	// 変数に要素を入れる
	var button = $('.signin-button'),
	open = $('#login-main');
	button.on('click',function(){
		open.addClass('active');
		return false;
	});

	$(document).on('click',function(e) {
        if(!$(e.target).closest('.login-box').length) {
            open.removeClass('active');
        }
    });
});

// ハンバーガーメニュー表示
$(function(){
	// 変数に要素を入れる
	var hamimg = $('.hamburger-img'),
	hammenu = $('#hamburger-menu');
	hamimg.on('click',function(){
		hammenu.addClass('open');
		return false;
	});

	$(document).on('click',function(e) {
        if(!$(e.target).closest('.hamburger-header').length) {
            hammenu.removeClass('open');
        }
    });
});

