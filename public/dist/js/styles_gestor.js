function spc() {
    var er = new RegExp(/\s/);
    var nickname = document.getElementById('u_nickname').value;
    if (er.test(nickname)) {
        alert('No se permiten espacios en el Nick Name');
        return false;
    } else {
        return true;
    }
}

function num(c) {
    c.value = /^\d+$/.test(c.value) ? c.value : c.value.substr(0, c.value.length - 1);
}