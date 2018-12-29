$(document).ready(function(){
  $('.modal').modal();
});

$(document).ready(function(){
  $('.tooltipped').tooltip();
});

 $(document).ready(function(){
  $('.tabs').tabs();
});

$(document).ready(function(){
  $('.sidenav').sidenav();
});

$(document).ready(function(){
  $('select').formSelect();
});

$('.dropdown-trigger').dropdown();

$('.slide-trigger').click(function() {
  var $toggle = $(this).closest('.to_slide').find('.slideToggle');
 
  $('.btnClose').removeClass('close');
  $('.btnOpen').addClass('close');
 
  if($toggle.hasClass('open')) { 
    $toggle.removeClass('open');
    $toggle.slideUp();
    $('.btnOpen').removeClass('close');
    $('.btnClose').addClass('close');
    $('html').css( {
      position: 'absolute'
    });
    
  } else {
    $toggle.addClass('open'); 
    $toggle.slideDown();
    $('html').css( {        //ウィンドウ出現時、スクロール不可にする
      position: 'fixed'
    });
  }
});
//スライド・セレクター共通
$('.trigger').click(function() {
  var $toggle = $(this).closest('.selector').find('.select');
  
  if($toggle.hasClass('open')) { 
    $toggle.removeClass('open');
    $toggle.slideUp('fast');
    
  } else {
    $toggle.addClass('open'); 
    $toggle.slideDown();
  }
});
//セレクター枠外をクリックしても閉じるように
$(document).on('click', function(e) {
  if (!$(e.target).closest('.selector').length) {
    $('.select').removeClass('open');
    $('.select').slideUp('fast');
    }
});
$('.select_trigger').click(function(){
  console.log('hello')
  $('.select_trigger a')[0].click(); 
});
//スライド・セレクター共通ここまで

//選手リスト ポジションセレクター
$('.all').click(function(){
  $('.pitcherTable').removeClass('hide');
  $('.inFielderTable').removeClass('hide');
  $('.outFielderTable').removeClass('hide');
  $('.catcherTable').removeClass('hide');
  $('#selected').text('全選手');
})
$('.pitcher').click(function(){
  $('.pitcherTable').removeClass('hide');
  $('.inFielderTable').addClass('hide');
  $('.outFielderTable').addClass('hide');
  $('.catcherTable').addClass('hide');
  $('#selected').text('投手');
})
$('.inFielder').click(function(){
  $('.pitcherTable').addClass('hide');
  $('.inFielderTable').removeClass('hide');
  $('.outFielderTable').addClass('hide');
  $('.catcherTable').addClass('hide');
  $('#selected').text('内野手');
})
$('.outFielder').click(function(){
  $('.pitcherTable').addClass('hide');
  $('.inFielderTable').addClass('hide');
  $('.outFielderTable').removeClass('hide');
  $('.catcherTable').addClass('hide');
  $('#selected').text('外野手');
})
$('.catcher').click(function(){
  $('.pitcherTable').addClass('hide');
  $('.inFielderTable').addClass('hide');
  $('.outFielderTable').addClass('hide');
  $('.catcherTable').removeClass('hide');
  $('#selected').text('捕手');
})

$(function() {
    var topBtn = $('#page-top');    
    topBtn.hide();
    //スクロールが800に達したらボタン表示
    $(window).scroll(function () {
        if ($(this).scrollTop() > 800) {
            topBtn.fadeIn();
        } else {
            topBtn.fadeOut();
        }
    });
    //スクロールしてトップ
    topBtn.click(function () {
        $('body,html').animate({
            scrollTop: 0
        }, 500);
        return false;
    });
});
$('.aa').click(function(){
  console.log('hello');
});