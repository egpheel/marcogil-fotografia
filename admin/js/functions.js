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
  var option;

  option = $(select + ' option:selected').val();
  $(destElement).load('./php-resources/show.php?e=' + option);

  $(select).change(function () {
    option = $(select + ' option:selected').val();
    $(destElement).load('./php-resources/show.php?e=' + option);
  });
};

function del(btn, destElement) {
  $('body').on('click', btn, function(e) {
    var pic = $(e.target).parent().attr('id');
    console.log(pic);
    $('.deleted').load('./php-resources/delete.php?d=' + pic);
  });
};

$(function () {
  preview('.texto');
  getSel('#catsel', '.results');
  del('#delBtn');
});
