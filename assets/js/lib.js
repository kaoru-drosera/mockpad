console.log('hello,gulp.lol');

jQuery(function($){
  // 初期表示
  $('.panel').hide();
  $('.panel').eq(0).show();
  $('.panel').eq(0).addClass('panel-on');
  // クリックイベント
  $('.changer-tab').each(function(){
    $(this).on('click',function(){
      var index = $('.changer-tab').index(this);
      $('.panel').hide();
      $('.panel').eq(index).fadeIn();
    });
  });



});



;
