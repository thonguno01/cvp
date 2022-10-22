// function form_validate() {
//     let out = callAjax('/email-authentic/send-mail');
//             if (out.message == '') {
//                 alert('Gửi lại Email thành công!');
//                 // window.location = out.link;
//             } else {
//                 alert(out.message);
//             }
// }
$('#btn_reSendMail').click(function() {
    $('#btn_reSendMail').attr('disabled', 'disabled');
    let sendMail = callAjax('merchant-authentic-resend', 'post', '');
    alert(sendMail.message);
});