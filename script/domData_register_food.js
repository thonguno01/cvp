
function dom_type_food_0(id){
    let type = $("#type_detail_0").val();
    document.getElementById('dom_type_food').innerHTML = `<span>`+type+`</span>`;
}
function dom_type_food_1(id){
    let type = $("#type_detail_1").val();
    document.getElementById('dom_type_food').innerHTML = `<span>`+type+`</span>`;
}
function dom_type_food_2(id){
    let type = $("#type_detail_2").val();
    document.getElementById('dom_type_food').innerHTML = `<span>`+type+`</span>`;
}
function dom_type_food_3(id){
    let type = $("#type_detail_3").val();
    document.getElementById('dom_type_food').innerHTML = `<span>`+type+`</span>`;
}
function dom_type_food_4(id){
    let type = $("#type_detail_4").val();
    document.getElementById('dom_type_food').innerHTML = `<span>`+type+`</span>`;
}
function dom_type_food_5(id){
    let type = $("#type_detail_5").val();
    document.getElementById('dom_type_food').innerHTML = `<span>`+type+`</span>`;
}
function dom_type_food_6(id){
    let type = $("#type_detail_6").val();
    document.getElementById('dom_type_food').innerHTML = `<span>`+type+`</span>`;
}
function dom_type_food_7(id){
    let type = $("#type_detail_7").val();
    document.getElementById('dom_type_food').innerHTML = `<span>`+type+`</span>`;
}
function dom_type_food_8(id){
    let type = $("#type_detail_8").val();
    document.getElementById('dom_type_food').innerHTML = `<span>`+type+`</span>`;
}
function dom_type_food_9(id){
    let type = $("#type_detail_9").val();
    document.getElementById('dom_type_food').innerHTML = `<span>`+type+`</span>`;
}
function save_type_detail(id){
    $('.choose-loai-mon-an-' + id).toggleClass('d-block');
    let type0 = $("#type_detail_0").val();
    let type1 = $("#type_detail_1").val();
    let type2= $("#type_detail_2").val();
    let type3= $("#type_detail_3").val();
    let type4= $("#type_detail_4").val();
    let type5= $("#type_detail_5").val();
    let type6= $("#type_detail_6").val();
    let type7= $("#type_detail_7").val();
    let type8= $("#type_detail_8").val();
    let type9= $("#type_detail_9").val();
    let an = document.getElementsByName('an').checked;
    console.log(an)
    if(document.getElementById('type_detail_0').checked){
    document.getElementById('list_type_food_selected').innerHTML = `<span>`+type0+`</span>`;
    }
    if(document.getElementById('type_detail_1').checked){
    document.getElementById('list_type_food_selected').innerHTML = `<span>`+type1+`</span>`;
    }
    if(document.getElementById('type_detail_2').checked){
    document.getElementById('list_type_food_selected').innerHTML = `<span>`+type2+`</span>`;
    }
    if(document.getElementById('type_detail_3').checked){
    document.getElementById('list_type_food_selected').innerHTML = `<span>`+type3+`</span>`;
    }
    if(document.getElementById('type_detail_4').checked){
    document.getElementById('list_type_food_selected').innerHTML = `<span>`+type4+`</span>`;
    }
    if(document.getElementById('type_detail_5').checked){
    document.getElementById('list_type_food_selected').innerHTML = `<span>`+type5+`</span>`;
    }
    if(document.getElementById('type_detail_6').checked){
    document.getElementById('list_type_food_selected').innerHTML = `<span>`+type6+`</span>`;
    }
    if(document.getElementById('type_detail_7').checked){
    document.getElementById('list_type_food_selected').innerHTML = `<span>`+type7+`</span>`;
    }
    if(document.getElementById('type_detail_8').checked){
    document.getElementById('list_type_food_selected').innerHTML = `<span>`+type8+`</span>`;
    }
    if(document.getElementById('type_detail_9').checked){
    document.getElementById('list_type_food_selected').innerHTML = `<span>`+type9+`</span>`;
    }
}
var text = '';
function dom_detail(){
    let detail_name = $("#choose_detail").val();
    text += detail_name + ",";
    $('#descrip_combo_1').val(text);
}
function dom_detail_gr(){
    let detail_name = $("#choose_detail_gr").val();
    text += detail_name + ",";
    $('#gr_choose_1').val(text);
}