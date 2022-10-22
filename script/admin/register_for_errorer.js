function validate(){
    let name = document.getElementById('name').value;
    let email = document.getElementById('email').value;
    let phone = document.getElementById('phone').value;
    let password = document.getElementById('password').value;
    let flag = true; 
    let regex = new RegExp("^.*(?=.{6,})(?=.*[a-z])(?=.*[a-z])(?=.*[0-9])[a-zA-Z0-9@#$%^&+=]*$");
    var phoneformat = /^\d+/;
    var emailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

    if (name == '') {
        document.getElementById('error_name').innerHTML = `<span class="error_message">(Không được bỏ trống tên quán ăn)</span>`;
        flag = false;
    }
    else{
        document.getElementById('error_name').innerHTML = `<span class="error_message"></span>`;
    }
    if (email == '') {
        document.getElementById('error_email').innerHTML = `<span class="error_message">(Không được bỏ trống Email)</span>`;
        flag = false;
    } else if (!email.match(emailformat)) {
            document.getElementById('error_email').innerHTML = `<span class="error_message">(Email Không đúng định dạng)</span>`;
            flag = false;
    }
    else{
        let data_json = { 
            email: email,
        }
        let out = callAjax('/admin-check-email', 'post', data_json);
        if (out.rs == true) {
            document.getElementById('error_email').innerHTML = `<span class="error_message">(Email đã tồn tại trên hệ thống!)</span>`;
            flag = false;
        } else if(out.rs == false) {
            document.getElementById('error_email').innerHTML = `<span class="error_message"></span>`;
        }
    }
    if (phone == '') {
        document.getElementById('error_phone').innerHTML = `<span class="error_message">(Không được bỏ trống SĐT)</span>`;
        flag = false;
    } else if (!phone.match(phoneformat)) {
            document.getElementById('error_phone').innerHTML = `<span class="error_message">(SĐT Không đúng định dạng)</span>`;
            flag = false;
    }
    else{
        document.getElementById('error_phone').innerHTML = `<span class="error_message"></span>`;
    }
    if (password == '') {
        document.getElementById('error_pass').innerHTML = `<span class="error_message">(Không được bỏ trống mật khẩu)</span>`;
        flag = false;
    } else if (!password.match(regex)) {
            document.getElementById('error_pass').innerHTML = `<span class="error_message">(Mật khẩu tối thiểu 6 ký tự bao gồm chữ và số)</span>`;
            flag = false;
    }
    else{
        document.getElementById('error_pass').innerHTML = `<span class="error_message"></span>`;
    }

    if (flag == true) {
        let data_json = { 
            name: name,
            email: email,
            password: password, 
            phone: phone,
        }
        let out = callAjax('/register-for-errorer-controller', 'post', data_json);
        if (out.rs == true) {
            alert("Đăng ký khách hàng thành công");
            window.location = 'list-customer-error';
        }
    }
}
function validate_merchant(){
    let name = document.getElementById('name').value;
    let email = document.getElementById('email').value;
    let phone = document.getElementById('phone').value;
    let password = document.getElementById('password').value;
    let flag = true; 
    let regex = new RegExp("^.*(?=.{6,})(?=.*[a-z])(?=.*[a-z])(?=.*[0-9])[a-zA-Z0-9@#$%^&+=]*$");
    var phoneformat = /^\d+/;
    var emailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

    if (name == '') {
        
        flag = false;
    }
    else{
        document.getElementById('error_name').innerHTML = `<span class="error_message"></span>`;
    }
    if (email == '') {
        document.getElementById('error_email').innerHTML = `<span class="error_message">(Không được bỏ trống Email)</span>`;
        flag = false;
    } else if (!email.match(emailformat)) {
            document.getElementById('error_email').innerHTML = `<span class="error_message">(Email Không đúng định dạng)</span>`;
            flag = false;
    }
    else{
        let data_json = { 
            email: email,
        }
        let out = callAjax('/admin-check-email', 'post', data_json);
        if (out.rs == true) {
            document.getElementById('error_email').innerHTML = `<span class="error_message">(Email đã tồn tại trên hệ thống!)</span>`;
            flag = false;
        } else if(out.rs == false) {
            document.getElementById('error_email').innerHTML = `<span class="error_message"></span>`;
        }
    }
    if (phone == '') {
        document.getElementById('error_phone').innerHTML = `<span class="error_message">(Không được bỏ trống SĐT)</span>`;
        flag = false;
    } else if (!phone.match(phoneformat)) {
            document.getElementById('error_phone').innerHTML = `<span class="error_message">(SĐT Không đúng định dạng)</span>`;
            flag = false;
    }
    else{
        document.getElementById('error_phone').innerHTML = `<span class="error_message"></span>`;
    }
    if (password == '') {
        document.getElementById('error_pass').innerHTML = `<span class="error_message">(Không được bỏ trống mật khẩu)</span>`;
        flag = false;
    } else if (!password.match(regex)) {
            document.getElementById('error_pass').innerHTML = `<span class="error_message">(Mật khẩu tối thiểu 6 ký tự bao gồm chữ và số)</span>`;
            flag = false;
    }
    else{
        document.getElementById('error_pass').innerHTML = `<span class="error_message"></span>`;
    }

    if (flag == true) {
        let data_json = { 
            name: name,
            email: email,
            password: password, 
            phone: phone,
        }
        let out = callAjax('/register-for-errorer-controller-2', 'post', data_json);
        if (out.rs == true) {
            alert("Đăng ký quán ăn thành công");
            window.location = 'list-merchant-error';
        }
    }
}

