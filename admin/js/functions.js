function preview(text) {
  var preview;
  $(text).on('keyup', function() {
    preview = $(text).val().replace(/\n/g, '<br />');
    $('.previewZone').html(preview);
  });
};

$(function () {
  preview('.texto');
});
