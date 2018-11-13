$(function() {
  $('.js-limitedtextarea').on('keyup', function(e) {
    var textarea = $(this);
    var current = textarea.val().length;
    var limit = textarea.data('limit');
    var charLimitCurrent = $('#char-limit-' + textarea.attr('id'));

    charLimitCurrent.text(current);

    if (limit - current < 10) {
      charLimitCurrent.addClass('has-error');
    }
    else {
      charLimitCurrent.removeClass('has-error');
    }
  });
});
