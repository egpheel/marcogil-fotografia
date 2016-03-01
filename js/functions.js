var isNavbarShowing = false;

$(window).scroll(function() {
  var wScroll = $(this).scrollTop();
  var offset = $('.menu .left').offset().top;

  $('.hero h1').css('transform', 'translate(0px, '+ wScroll /2 +'%)')

  if (wScroll > offset) {
    if (!isNavbarShowing) {
      $('.showNavbar').fadeIn();
    }
    isNavbarShowing = true;
  } else {
    if (isNavbarShowing) {
      $('.showNavbar').fadeOut();
    }
    isNavbarShowing = false;
  };
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
  var iemobile = /iemobile/i.test(navigator.userAgent.toLowerCase());

  if (webkit && !iemobile) {
    changeHero();
  } else {
    randomHero();
  };

  //initialize tooltips
  $('[data-toggle="tooltip"]').tooltip();

  //contact mailer
  $('#contacto .contact-form form').submit(function(event) {
    event.preventDefault();
    var nomeVal = $('.nome').val();
    var emailVal = $('.email').val();
    var messageVal = $('.message').val();

    $('.nome').val('');
    $('.email').val('');
    $('.message').val('');

    $('#contacto .contact-form form button').attr('disabled', 'disabled');

    $.post('./php-resources/mailer.php', {
      nome: nomeVal,
      email: emailVal,
      message: messageVal
    }, function(data) {
      $('#contacto .contact-form form button').hide();
      $('#contacto .contact-form form .messageSent').show();
    });
  });
});

function changeHero() {
  var interval = 5000; //8secs
  var transition = '2s'; //2secs
  var heroes = [];
  var current = 0;
  var url = './img/heroes/';

  $.get('./php-resources/countheroes.php', function(data) {
    heroes = $.parseJSON(data);
  });

  $('.hero').css('background-image','url("./img/heroes/hero-img'+ (current + 1) +'.jpg")');
  $('.hero').css('transition','background-image '+ transition +' ease-in-out');
  current++; //skip the first one which is the same that is already showing

  var heroChanger = setInterval(function() {
    if (current >= heroes.length) {
      current = 0;
    }

    if (typeof heroes[current] === 'undefined') {
      console.log('halt!');
      clearInterval(heroChanger);
    }

    $('<img/>').attr('src', url + heroes[current]).load(function() {
      $(this).remove();
      $('.hero').css('background-image','url('+ url + heroes[current] +')');
      current++;
    });
  }, interval)
};

function randomHero() {
  var heroes = 14;
  var randHero = Math.floor(Math.random() * heroes) + 1;

  $('.hero').css('background-image', 'url("./img/heroes/hero-img'+ randHero +'.jpg")');
};
