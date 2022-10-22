function search() {
    let addressMe = $('#addressMe').val().trim();
    let nameDish = $('#nameDish').val().trim();
    let datajson = {
        nameDish: nameDish,
        addressMe: addressMe
    }
    let search = callAjax('handles/customer/home/QuanLyChungController/search', 'post', datajson)

    if (search.rs == true) {
        window.location = search.url;
        console.log(search);
    }
}