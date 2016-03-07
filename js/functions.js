var isNavbarShowing = false;
var currentCat;
var currentCatPrefix;
var galleryOpen = false;

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
    var errorMsgDuration = 7000 //7 secs

    if (nomeVal != '' && emailVal != '' && messageVal != '') {
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
    } else {
      $('#contacto .contact-form form .messageError').show();

      var errorTimeout = setTimeout(function() {
        $('#contacto .contact-form form .messageError').hide();
      }, errorMsgDuration);
    };
  });

  //categorias
  $('.categorias').bind('click', function(e) {
    var cat = $(e.target).attr('class');

    if (cat == 'overlay') {
      cat = $(e.target).parent().attr('class');
    };

    if (cat == undefined) {
      cat = $(e.target).parent().parent().attr('class');
    };

    $('.catopen-wrap').slideDown();

    var catPrefix = '.' + cat;

    cat = '.' + cat + 'open';

    if (cat === currentCat) {
      //do nothing
    } else {
      $(currentCatPrefix).removeAttr('id');
      $(currentCatPrefix + '> .overlay').css('top', '');
      $('.categorias').children('div :not(#selected)').attr('id', 'notSelected');
      $(catPrefix + '> .overlay').css('top', '75%');
      $(catPrefix).attr('id', 'selected');
      if(galleryOpen) {
        $(currentCat).fadeOut();
        $(cat).delay(400).fadeIn();
      } else {
        $(currentCat).hide();
        $(cat).show();
      }
    };

    if ($(catPrefix).css('opacity') === '1' && galleryOpen) {
      $('.categorias').children('div').removeAttr('id');
      $('.catopen-wrap').slideUp(1200);
      $(currentCatPrefix + '> .overlay').css('top', '');
      galleryOpen = false;

      if ($('#trabalho').length) {
        $('html, body').animate({
          scrollTop: $('#trabalho').offset().top
        }, 1000);
        return false;
      }
    } else {
      $('.categorias').children('div :not(#selected)').attr('id', 'notSelected');
      $(catPrefix + '> .overlay').css('top', '75%');
      $(catPrefix).attr('id', 'selected');
      galleryOpen = true;
    };

    $('.closeBtn').click(function() {
      $('.categorias').children('div').removeAttr('id');
      $('.catopen-wrap').slideUp(1200);
      $(currentCatPrefix + '> .overlay').css('top', '');
      galleryOpen = false;
    });

    currentCat = cat;
    currentCatPrefix = catPrefix;

    if ($('#catsOpen').length) {
      $('html, body').animate({
        scrollTop: $('#catsOpen').offset().top - 100
      }, 1000);
      return false;
    }
  });

  $('.pic').click(function() {
    var picture = $('img', this).attr('src');
    var parent = $(this).parent();
    var title = $('.catDesc-wrap h1', parent).html();
    var text = $('p', this).html();

    picture = picture.replace('/thumbs/', '/');

    $('#modalLabel').html(title);
    $('.modal-body > img').attr('src', picture);
    $('.modal-body > p').html(text);
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
