(function($){
  function showToast(msg, type){
    const $toast = $('<div class="jvcf-toast"/>').addClass(type || 'success').text(msg);
    $('body').append($toast);
    // force reflow then show
    setTimeout(()=>{$toast.addClass('show');}, 10);
    setTimeout(()=>{$toast.removeClass('show'); setTimeout(()=>{$toast.remove();}, 300);}, 3500);
  }

  $(document).on('submit', '#jvcf-form', function(e){
    e.preventDefault();
    const $form = $(this);
    const $alert = $('#jvcf-alert').removeClass('success error').hide();

    const data = {
      action: 'jvcf_submit',
      nonce: $form.find('input[name="nonce"]').val(),
      full_name: $.trim($form.find('input[name="full_name"]').val()),
      phone: $.trim($form.find('input[name="phone"]').val()),
      email: $.trim($form.find('input[name="email"]').val()),
      interest: $form.find('select[name="interest"]').val(),
      message: $.trim($form.find('textarea[name="message"]').val())
    };

    if (!data.full_name || !data.phone || !data.email) {
      $alert.addClass('error').text(JVCF.messages.required).show();
      return;
    }
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(data.email)) {
      $alert.addClass('error').text(JVCF.messages.invalid_email).show();
      return;
    }

    $form.find('button[type="submit"]').prop('disabled', true).addClass('is-loading');

    $.post(JVCF.ajax_url, data)
      .done(function(res){
        let payload = res;
        if (typeof res === 'string') {
          try { payload = JSON.parse(res); } catch (e) { payload = null; }
        }
        if (payload && payload.success) {
          $alert.hide();
          showToast(JVCF.messages.success, 'success');
          $form[0].reset();
        } else {
          const msg = payload && payload.data && payload.data.message ? payload.data.message : JVCF.messages.error;
          $alert.addClass('error').text(msg).show();
        }
      })
      .fail(function(){
        $alert.addClass('error').text(JVCF.messages.error).show();
      })
      .always(function(){
        $form.find('button[type="submit"]').prop('disabled', false).removeClass('is-loading');
      });
  });
})(jQuery);
