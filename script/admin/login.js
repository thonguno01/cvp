function login(){
    let email = document.getElementById("email").value;
    let password = document.getElementById("password").value;
    
    $.ajax({
        type: "POST",
        url: "login-admin",
        dataType: "json",
        data: {
            email: email,
            password: password,
        }, 
        success: function(data) {
          if(data.rs == false){
              alert(data.msg)
          }
          else if(data.rs == 'authentic'){
              alert(data.msg)
          }
          else{
              window.location = 'admin-index'
          }
        },
    });
}