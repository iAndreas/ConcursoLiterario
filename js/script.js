$(window).scroll(function(){
  if($('.navbar').offset().top > 50){
    $('.navbar-fixed-top').addClass('top-nav-collapse');
    $('.navbar-fixed-top a').css({color: '#3a3a3a'});
    $('.navbar-fixed-top .navbar-toggle .icon-bar').css({background: '#3a3a3a'});
  }else{
    $('.navbar-fixed-top').removeClass('top-nav-collapse');
    $('.navbar-fixed-top a').css({color: '#fff'});
    $('.navbar-fixed-top .navbar-toggle .icon-bar').css({background: '#fff'})
  }
});

$('.navbar-toggle').click(function(){
  $(this).toggleClass('active');
});

$('.btn-about').mouseenter(function(){
    $(this).hide('explode', {pieces: 100});
    $(this).promise().done(function(){
      $('.about-icon').fadeIn(400);
    });
  });

$('#home').mouseleave(function(){
  $(this).find('.about-icon').hide(); 
  $(this).find('.btn-about').show();
});

$('.img-portrait').hover(function(){
  $(this).css({border: '0 solid #c9c9c9'}).animate({
    borderWidth: 6
  }, 400, function(){
    $(this).effect('shake', {distance: 10}, 'slow');
  });
},
function(){
  $(this).animate({
    borderWidth: 0
  }, 400);
});