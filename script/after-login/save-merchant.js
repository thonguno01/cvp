function like(idMechant) {
    let data_json = {
        idMechant: idMechant,
    }
    let likeMechant = callAjax('/action-mechant-like', 'post', data_json);
    if (likeMechant.result == 'del') {
        window.location = 'save-merchant';
        alert(likeMechant.mesage)
    } else {
        alert(likeMechant.mesage)

    }
}