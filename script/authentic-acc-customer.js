$('#btn_reSendMail').click(function() {
    $('#btn_reSendMail').attr('disabled', 'disabled');
    let sendMail = callAjax('customer-authentic-resend', 'post', '');
    alert(sendMail.message);
}); 