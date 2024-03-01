'use stric'
let colorear_satis = (porcentaje) => {
    let pintar
    console.log(porcentaje);
    if (porcentaje != 0) {
        if (porcentaje >= 98.50) { pintar = "__tas_GOD" }
        else if (96.50 <= porcentaje && porcentaje <= 98.49) { pintar = "__advertencia" }
        else if (porcentaje < 96.50) { pintar = "__peligro" }
    } else { pintar = "" }
    return pintar
}
let colorear_lib = (porcentaje) => {
    let pintar
    console.log(porcentaje);
    if (porcentaje != 0) {
        if (porcentaje >= 85) { pintar = "__tas_GOD" }
        else if (80 <= porcentaje && porcentaje <= 85) { pintar = "__advertencia" }
        else if (porcentaje < 80) { pintar = "__peligro" }
    } else { pintar = "" }
    return pintar
}
var get_calc_hoy_satisfaccion = () => {
    var estado = (d) => { document.querySelector("#satisfaccion .hoy .content").innerHTML = d }
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "record/load.php", true);
    xhr.setRequestHeader("Charset", "UTF-8");
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("satisfaccion=true&type=hoy");
    // xhr.onprogress = function () { estado("<p>cargando...</p>") };
    xhr.onreadystatechange = function () { // Call a function when the state changes.
        if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
            console.log("si esta");
        }
        if (xhr.readyState === 4) {
            res = JSON.parse(xhr.response)
            porcentaje = res.sat.toFixed(2)
            estado(`
            <div class="_porsent">
                <div class="item child  ${colorear_satis(porcentaje)}">${porcentaje}%</div>
            </div>
            <div class="_info">
                <div class="item child">1 -> ${res.data.insa[1]}</div>
                <div class="item child">2 -> ${res.data.insa[2]}</div>
                <div class="item child">3 -> ${res.data.sat[3]}</div>
                <div class="item child">4 -> ${res.data.sat[4]}</div>
                <div class="item child">5 -> ${res.data.sat[5]}</div>
            </div>
            `)
            //  console.log(xhr.response);   
        }
    }
}
var get_calc_semana_satisfaccion = () => {
    var estado = (d) => { document.querySelector("#satisfaccion .semana .content").innerHTML = d }
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "record/load.php", true);
    xhr.setRequestHeader("Charset", "UTF-8");
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("satisfaccion=true&type=semana");
    // xhr.onprogress = function () { estado("<p>cargando...</p>") };
    xhr.onreadystatechange = function () { // Call a function when the state changes.
        if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
            console.log("si esta");
        }
        if (xhr.readyState === 4) {
            res = JSON.parse(xhr.response)
            porcentaje = res.sat.toFixed(2)
            estado(`
            <div class="_porsent">
                <div class="item child  ${colorear_satis(porcentaje)}">${porcentaje}%</div>
            </div>
        <div class="_info">
            <div class="item child">1 -> ${res.data.insa[1]}</div>
            <div class="item child">2 -> ${res.data.insa[2]}</div>
            <div class="item child">3 -> ${res.data.sat[3]}</div>
            <div class="item child">4 -> ${res.data.sat[4]}</div>
            <div class="item child">5 -> ${res.data.sat[5]}</div>
        </div>
            `)
            //  console.log(xhr.response);   
        }
    }
}
var get_calc_mes_satisfaccion = () => {
    var estado = (d) => { document.querySelector("#satisfaccion .mes .content").innerHTML = d }
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "record/load.php", true);
    xhr.setRequestHeader("Charset", "UTF-8");
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("satisfaccion=true&type=mes");
    // xhr.onprogress = function () { estado("<p>cargando...</p>") };
    xhr.onreadystatechange = function () { // Call a function when the state changes.
        if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
            console.log("si esta");
        }
        if (xhr.readyState === 4) {
            res = JSON.parse(xhr.response)
            porcentaje = res.sat.toFixed(2)
            estado(`
            <div class="_porsent">
                <div class="item child  ${colorear_satis(porcentaje)}">${porcentaje}%</div>
            </div>
        <div class="_info">
            <div class="item child">1 -> ${res.data.insa[1]}</div>
            <div class="item child">2 -> ${res.data.insa[2]}</div>
            <div class="item child">3 -> ${res.data.sat[3]}</div>
            <div class="item child">4 -> ${res.data.sat[4]}</div>
            <div class="item child">5 -> ${res.data.sat[5]}</div>
        </div>
            `)
            //  console.log(xhr.response);   
        }
    }
}
var get_calc_hoy_liberacion = () => {
    var estado = (d) => { document.querySelector("#liberacion .hoy .content").innerHTML = d }
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "record/load.php", true);
    xhr.setRequestHeader("Charset", "UTF-8");
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("liberacion=true&type=hoy");
    // xhr.onprogress = function () { estado("<p>cargando...</p>") };
    xhr.onreadystatechange = function () { // Call a function when the state changes.
        if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
            console.log("si esta");
        }
        if (xhr.readyState === 4) {
            res = JSON.parse(xhr.response)
            console.log(res);

            porcentaje = res.libs.toFixed(2)
            estado(`
            <div class="_porsent">
                <div class="item child  ${colorear_lib(porcentaje)}">${porcentaje}%</div>
            </div>
            <div class="_info">
                <div class="item child">liberacion    -> ${res.data.liberacion}</div>
                <div class="item child">corte             -> ${res.data.corte}</div>
                <div class="item child">tranferencia -> ${res.data.transferencia}</div>
            </div>
            `)
            //  console.log(xhr.response);   
        }
    }
}
var get_calc_semana_liberacion = () => {
    var estado = (d) => { document.querySelector("#liberacion .semana .content").innerHTML = d }
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "record/load.php", true);
    xhr.setRequestHeader("Charset", "UTF-8");
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("liberacion=true&type=semana");
    // xhr.onprogress = function () { estado("<p>cargando...</p>") };
    xhr.onreadystatechange = function () { // Call a function when the state changes.
        if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
            console.log("si esta");
        }
        if (xhr.readyState === 4) {
            res = JSON.parse(xhr.response)
            console.log(res);

            porcentaje = res.libs.toFixed(2)
            estado(`
            <div class="_porsent">
                <div class="item child  ${colorear_lib(porcentaje)}">${porcentaje}%</div>
            </div>
            <div class="_info">
                <div class="item child">liberacion    -> ${res.data.liberacion}</div>
                <div class="item child">corte             -> ${res.data.corte}</div>
                <div class="item child">tranferencia -> ${res.data.transferencia}</div>
            </div>
            `)
            //  console.log(xhr.response);   
        }
    }
}
var get_calc_mes_liberacion = () => {
    var estado = (d) => { document.querySelector("#liberacion .mes .content").innerHTML = d }
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "record/load.php", true);
    xhr.setRequestHeader("Charset", "UTF-8");
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("liberacion=true&type=mes");
    // xhr.onprogress = function () { estado("<p>cargando...</p>") };
    xhr.onreadystatechange = function () { // Call a function when the state changes.
        if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
            console.log("si esta");
        }
        if (xhr.readyState === 4) {
            res = JSON.parse(xhr.response)
            console.log(res);

            porcentaje = res.libs.toFixed(2)
            estado(`
            <div class="_porsent">
                <div class="item child  ${colorear_lib(porcentaje)}">${porcentaje}%</div>
            </div>
            <div class="_info">
                <div class="item child">liberacion    -> ${res.data.liberacion}</div>
                <div class="item child">corte             -> ${res.data.corte}</div>
                <div class="item child">tranferencia -> ${res.data.transferencia}</div>
            </div>
            `)
            //     //  console.log(xhr.response);   
        }
    }
}
get_calc_hoy_satisfaccion()
get_calc_semana_satisfaccion()
get_calc_mes_satisfaccion()
get_calc_hoy_liberacion()
get_calc_semana_liberacion()
get_calc_mes_liberacion()