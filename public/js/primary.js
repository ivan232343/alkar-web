'use stric'
const this_win = window.location
const path_host = this_win.origin + this_win.pathname
document.querySelectorAll('.js-time-picker').forEach((e) => {
    new Picker(e, {
        format: 'HH:mm:ss',
        headers: true,
        text: {
            title: 'Escoge una hora',
        },
    })
});
document.querySelector("#tipo_corte").onchange = (e) => {
    if (e.srcElement.value != 1) {
        document.getElementsByName("satisfaccion").forEach((e) => { e.setAttribute("disabled", "true") })
    } else {
        document.getElementsByName("satisfaccion").forEach((e) => { e.removeAttribute("disabled") })
    }
}

const estado = (d) => { document.querySelector(".status").innerHTML = d }


