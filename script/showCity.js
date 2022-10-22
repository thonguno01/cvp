// $('#id_city').change(function() {
//     let cit_id = $("#id_city").val();
//     let data_json = { 
//         cit_id: cit_id,
//     }
//     let out = callAjax('/showCity', 'post', data_json);
//     // console.log(result);
//         // if (result.length > 0) {
//             // var i = 0;
//             var html = "<option value=''>Chọn quận huyện</option>";

//             // for (i = 0; i < result.length; i++) {
//                 html += `<option value="` + cit_id + `"></option>`;
//             // }
//             $('#id_district').html(html);
//         // }
//   });


  $('#id_city').change(function() { 
    let cit_id = $("#id_city").val();
    // alert(cit_id);
    $.ajax({
        url: "/showCity",
        type: 'POST',
        dataType: "json",
        data: {
            cit_id: $("#id_city").val(),
        }, 
        success: function(result) {
          console.log(result);
          if (result.length > 0) {
              var i = 0;
              var html = "<option value='-1'>Chọn quận huyện</option>";
              for (i = 0; i < result.length; i++) {
                  html += `<option value="` + result[i].cit_id + `">` + result[i].cit_name + `</option>`;
              }
              $('#id_district').html(html);
          }
        },
      });
  });