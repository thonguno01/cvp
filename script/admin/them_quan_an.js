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
        let out = callAjax('/admin-them-merchant-done', 'post', data_json);
        if (out.rs == true) {
            alert("Thêm quán ăn thành công");
            window.location = 'admin-list-merchant';
        }
    }
}
function validate_edit(id){
    let name = document.getElementById('name').value;
    let name_merchant = document.getElementById('name_merchant').value;
    let typical_food = document.getElementById('typical_food').value;
    let phone = document.getElementById('phone').value;
    let address = document.getElementById('address').value;
    let key_word = document.getElementById('key_word').value;
    let fee_ship = document.getElementById('fee_ship').value;
    let description = document.getElementById('description').value;
    let img_avatar = document.getElementById('img_avatar').value;
    let img_cover = document.getElementById('img_cover').value;
    let flag = true; 
    let regex = new RegExp("^.*(?=.{6,})(?=.*[a-z])(?=.*[a-z])(?=.*[0-9])[a-zA-Z0-9@#$%^&+=]*$");
    var phoneformat = /^\d+/;
    var emailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (name == '') {
        document.getElementById('error_name').innerHTML = `<span class="error_message">(Không được bỏ trống)</span>`;
        flag = false;
    }
    else{
        document.getElementById('error_name').innerHTML = `<span class="error_message"></span>`;
    }
    if (name_merchant == '') {
        document.getElementById('error_name_mer').innerHTML = `<span class="error_message">(Không được bỏ trống)</span>`;
        flag = false;
    }
    else{
            document.getElementById('error_name_mer').innerHTML = `<span class="error_message"></span>`;
    }
    if (phone == '') {
        document.getElementById('error_phone').innerHTML = `<span class="error_message">(Không được bỏ trống)</span>`;
        flag = false;
    } else if (!phone.match(phoneformat)) {
            document.getElementById('error_phone').innerHTML = `<span class="error_message">(SĐT Không đúng định dạng)</span>`;
            flag = false;
    }
    else{
        document.getElementById('error_phone').innerHTML = `<span class="error_message"></span>`;
    }
    if (typical_food == '') {
        document.getElementById('error_type').innerHTML = `<span class="error_message">(Không được bỏ trống)</span>`;
        flag = false;
    }
    else{
        document.getElementById('error_type').innerHTML = `<span class="error_message"></span>`;
    }
    if (address == '') {
        document.getElementById('error_address').innerHTML = `<span class="error_message">(Không được bỏ trống)</span>`;
        flag = false;
    }
    else{
        document.getElementById('error_address').innerHTML = `<span class="error_message"></span>`;
    }
    if (key_word == '') {
        document.getElementById('error_key').innerHTML = `<span class="error_message">(Không được bỏ trống)</span>`;
        flag = false;
    }
    else{
        document.getElementById('error_key').innerHTML = `<span class="error_message"></span>`;
    }
    if (fee_ship == '') {
        document.getElementById('error_fee').innerHTML = `<span class="error_message">(Không được bỏ trống)</span>`;
        flag = false;
    }
    else{
        document.getElementById('error_fee').innerHTML = `<span class="error_message"></span>`;
    }
    if (description == '') {
        document.getElementById('error_des').innerHTML = `<span class="error_message">(Không được bỏ trống)</span>`;
        flag = false;
    }
    else{
        document.getElementById('error_des').innerHTML = `<span class="error_message"></span>`;
    }
    if (flag == true) {
        let data_json = { 
            id : id,
            name: name,
            address: address,
            name_merchant: name_merchant, 
            phone: phone,
            namtypical_foode: typical_food,
            key_word: key_word,
            fee_ship: fee_ship, 
            description: description,
        }
        let out = callAjax('/admin-edit-merchant-done', 'post', data_json);
        if (out.rs == true) {
            alert("Sửa quán ăn thành công");
            window.location = 'admin-list-merchant';
        }
    }
}

function validate_add_admin(){
    let name = $("#name").val();
    let email = $("#email").val();
    let phone = $("#phone").val();
    let password = $("#password").val();
    let administrators = $("#administrators").val();
     
    var emailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    let check = true;
    if(authentic == true){
        auth = 1;
    }
    else{
        auth = 0;
    }
    if(email == ''){
        document.getElementById('error_email').innerHTML = `<span class="error_message">Không được bỏ trống Email !</span>`;
        check = false
    }else if (!email.match(emailformat)) {
        document.getElementById('error_email').innerHTML = `<span class="error_message">Email Không đúng định dạng !</span>`;
        flag = false;
    }
    else{
        let data_json = { 
            email: email,
        }
        let out = callAjax('/check-email-admin', 'post', data_json);
        if (out.rs == true) {
            document.getElementById('error_email').innerHTML = `<span class="error_message">Email đã tồn tại trên hệ thống!</span>`;
            flag = false;
        } else if(out.rs == false) {
            document.getElementById('error_email').innerHTML = `<span class="error_message"></span>`;
        }
    }
    if(password == ''){
        document.getElementById('error_pass').innerHTML = `<span class="error_message">Không được bỏ trống Password !</span>`;
        check = false
    }
    else{
        document.getElementById('error_pass').innerHTML = `<span class="error_message"></span>`;
    }
    if(check == true){
        let data_json = { 
            name: name,
            email: email,
            phone: phone,
            password: password,
            administrators: administrators,
            auth: auth,
        }
        let out = callAjax('/administrators-add/php', 'post', data_json);
        if (out.rs == true) {
            alert("Thêm quản trị viên thành công !")
            window.location = 'administrators';
        }
    }
}
function validate_edit_admin(id){
    let name = $("#name").val();
    let email = $("#email").val();
    let phone = $("#phone").val();
    let password = $("#password").val();
    let administrators = $("#administrators").val();

        let data_json = {
            id : id, 
            name: name,
            email: email,
            phone: phone,
            password: password,
            administrators: administrators,
        }
        let out = callAjax('/administrators-edit/php', 'post', data_json);
        if (out.rs == true) {
            alert("Sửa quản trị viên thành công !")
            window.location = 'administrators';
        }
}