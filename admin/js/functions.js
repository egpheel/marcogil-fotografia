function preview(text) {
  $(text).on('keyup', function() {
    $('.previewZone').html($(text).val());
  });
};

$(function () {
  preview('.texto');
});
