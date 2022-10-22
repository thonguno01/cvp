function logout(){
    
    if(confirm("Bạn có muốn đăng xuất?")== true){
        let redirect = callAjax('/logout');
        if (redirect.rs == true) {
            window.location = '/merchant-login';
        }
    }
}
function lich_su_don_hang(){
        window.location = '/lich-su-don-hang';
}
function ho_so_quan_an(){
    window.location = '/ho-so-quan-an'; 
}
function customer_home(){
    window.location = '/customer-home';
}
function don_hang_hom_nay(id){
    let data_json = {
        id: id, 
    }
    let checkLogin = callAjax('/update-status', 'post', data_json);
    window.location = 'don-hang-hom-nay';
}
function seen(id){
    let data_json = {
        id: id, 
    }
    let checkLogin = callAjax('/update-status-all', 'post', data_json);
    $('.load_seen').css(
        {'background' : 'none'}
    );
    $('#load_status').css(
        {'background' : 'none'}
    );
}