'use stric'
const alkar = document.querySelector("#alkar_record")
alkar.onsubmit = (e) => {
    e.preventDefault();
    var sat = alkar.querySelector("input[name='satisfaccion']:checked").value;
    var corte = alkar.querySelector("#tipo_corte").value;
    var inicio = alkar.querySelector("#in_time").value;
    var fin = alkar.querySelector("#out_time").value;
    const formulario = new FormData();
    formulario.append("tipo_corte", corte);
    formulario.append("insa", sat);
    formulario.append("time_in", inicio);
    formulario.append("time_out", fin);
    fetch(`${alkar.action}`, {
        method: "POST",
        body: formulario
    }).then(async res => {
        const data = await res.json();
        console.log(data)
        estado(data.msg);
        alkar_tab.ajax.reload(null, false);
        get_calc_hoy_satisfaccion();
        get_calc_semana_satisfaccion();
        get_calc_mes_satisfaccion();
        get_calc_hoy_liberacion();
        get_calc_semana_liberacion();
        get_calc_mes_liberacion();
        alkar.reset();
    }).catch(err => {
        console.log(err.error)
        estado(err.msg)
    })
}
