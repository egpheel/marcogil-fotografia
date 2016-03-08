function preview(textarea) {
  var preview;
  $(textarea).on('keyup', function() {
    preview = $(textarea).val().replace(/\n/g, '<br />');
    $('.previewZone').html(preview);
  });

  $(textarea).on('keydown', function() {
    preview = $(textarea).val().replace(/\n/g, '<br />');
    $('.previewZone').html(preview);
  });
};

function getSel(select, destElement) {
  var option = $(select + ' option:selected').val();
  $(destElement).load('./php-resources/show.php?e=' + option);

  $(select).change(function () {
    option = $(select + ' option:selected').val();
    $(destElement).load('./php-resources/show.php?e=' + option);
  });
};

function del(btn, destElement, select, refresh) {
  $('body').on('click', btn, function(e) {
    var pic = $(e.target).parent().attr('id');
    var cat = $(select + ' option:selected').val();
    $(destElement).load('./php-resources/delete.php?d=' + pic + '&c=' + cat);
    var clearDiv = setTimeout(function() {
      $(destElement).empty();
    }, 10000);

    var refreshPics = setTimeout(function() {
      getSel(select, refresh);
    }, 1500);
  });
};

$(function () {
  preview('.texto');
  getSel('#catsel', '.results');
  del('#delBtn', '.deleted', '#catsel', '.results');
});
