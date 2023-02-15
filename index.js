$(function () {
    $(window).on('scroll', function () {
        if ($('.covid').height() < $(this).scrollTop()) {
            $('header nav').addClass('change-color');
      } else {
            $('header nav').removeClass('change-color');
      }
    });
  });
    
    
  $(function(){
	var open = $('header nav .sign .signin_click, header nav .sp_signin_click');
	var	container = $('.form-popup');
    var modalarea = $('.modal-area');

	open.on('click',function(){	
		container.addClass('active');
        modalarea.addClass('overlay');
		return false;
	});

	$(document).on('click',function(e) {
        console.log($(e.target).closest('.form-popup').length);
		if(!$(e.target).closest('.form-popup').length) {
			container.removeClass('active');
            modalarea.removeClass('overlay');
		}
	});
});


$(function(){
	var open_sp = $('header nav .sign img');
	var	container_sp = $('header nav .sp_nav');

	open_sp.on('click',function(){	
		container_sp.css('visibility','visible');
		return false;
	});

	$(document).on('click',function(e) {
		if(!$(e.target).closest('.header nav .sp_nav').length) {
			container_sp.css('visibility','hidden');
		}
	});
});


$(function ($) {
    $('header nav .g_nav .menu_click1').on('click',function(){
        const location = $('.cafe_intro').offset().top;
        $("html").animate({scrollTop: location});
    });
});
$(function ($) {
    $('header nav .g_nav .menu_click2').on('click',function(){
        const location = $('.bg_black').offset().top;
        $("html").animate({scrollTop: location});
    });
});

$(function ($) {
    $('header nav .sp_menu_click1').on('click',function(){
        const location = $('.cafe_intro').offset().top;
        $("html").animate({scrollTop: location});
    });
});
$(function ($) {
    $('header nav .sp_menu_click2').on('click',function(){
        const location = $('.bg_black').offset().top;
        $("html").animate({scrollTop: location});
    });
});


function check(){
    var flag = 0;
    if(document.form1.name.value == ""){
        flag = 1;
    }
    else if(document.form1.kana.value == ""){
        flag = 1;
    }
    else if(document.form1.email.value == ""){
        flag = 1;
    }
    else if(document.form1.body.value == ""){
        flag = 1;
    }

    if(flag){
        window.alert('必須項目に未入力がありました');
        return false;
    }
    else{
        return true;
    }
}


limit_text=10;
function check() {
    var t=document.forms[0].name.value;
    var l=t.length;
    var c='';
    var han='0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ!"#$%&\'()=~|\\,./;:@[]<>?_+*}`{\n\t ';

    if ("あ".length==1) {
        while (t!='') {
            c=t.substring(0,1).toUpperCase();
            t=t.substring(1,t.length);
            if (han.indexOf(c)<0) { ++l; }
            }
        }

    if (l>limit_text) {
        window.alert(+limit_text+'文字以内で入力して下さい');
        return(false);
        }
    return(true);
}


function check(){
    var flag = 0;
    if(document.form1.tel.value.match(/[^0-9]+/)){
        flag = 1;
    }

    if(flag){
        window.alert('数字以外が入力されています');
        return false;
    }
    else{
        return true;
    }
}


function check(){
    var flag = 0;
    if(!document.form1.email.value.match(/.+@.+\..+/)){
        flag = 1;
    }

    if(flag){
        window.alert('メールアドレスが正しくありません');
        return false;
    }
    else{
        return true;
    }
}


