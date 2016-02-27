$(window).scroll(function() {
  var wScroll = $(this).scrollTop();

  $('.hero h1').css('transform', 'translate(0px, '+ wScroll /2 +'%)')
});

$(function() {
  //smooth scrolling
  $('a[href*="#"]:not([href="#"])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });

  //change hero-img
  var webkit = /webkit/.test(navigator.userAgent.toLowerCase());

  if (webkit) {
    changeHero();
  } else {
    randomHero();
  }
});

function changeHero() {
  var interval = 5000; //8secs
  var transition = '2s'; //2secs
  var heroes;
  var current = 1;

  $.get('./php-resources/countheroes.php', function(num) {
    heroes = num;
  });

  $('.hero').css('background-image','url("./img/heroes/hero-img'+ current +'.jpg")');
  $('.hero').css('transition','background-image '+ transition +' ease-in-out');

  var heroChanger = setInterval(function() {
    if (current > heroes) {
      current = 1;
    }

    $('<img/>').attr('src', './img/heroes/hero-img'+ current +'.jpg').load(function() {
      $(this).remove();
      $('.hero').css('background-image','url("./img/heroes/hero-img'+ current +'.jpg")');
      current++;
    });
  }, interval)
};

function randomHero() {
  var heroes = 9;
  var randHero = Math.floor(Math.random() * 9) + 1;

  $('.hero').css('background-image', 'url("./img/heroes/hero-img'+ randHero +'.jpg")');
};
