let alkar_tab = $('#alkar-today').DataTable({
    "responsive": true,
    "ajax": {
        "method": 'POST', //usamos el metodo POST
        "url": path_host+"record/load.php",
        "data": {
            f: "today"
        },
        "dataSrc": ""
    },
    pageLength: 0,
    lengthMenu: [5, 10, 20, 50, -1 + "all"],
    "columns": [
        { "data": "tipo_corte" },
        {
            "data": "calificacion",
            "render": function (d,t,r) {
                return  r.calificacion
            }
        },
        { "data": "time_in" },
        { "data": "time_out" },
        {
            "data": null,
            "render": function (d, t, r) {
                _in = r.time_in.split(/:/g)
                _out = r.time_out.split(/:/g)
                t1 = new Date()
                t2 = new Date()
                t2.setHours(_in[0], _in[1], _in[2]);
                t1.setHours(_out[0], _out[1], _out[2]);

                //Aquí hago la resta
                t1.setHours(t1.getHours() - t2.getHours(), t1.getMinutes() - t2.getMinutes(), t1.getSeconds() - t2.getSeconds());

                //Imprimo el resultado
                return (t1.getHours() ? t1.getHours() + (t1.getHours() > 1 ? " horas," : " hora,") : "") + (t1.getMinutes() ?  t1.getMinutes() + (t1.getMinutes() > 1 ? " minutos" : " minuto") : "") + (t1.getSeconds() ? (t1.getHours() || t1.getMinutes() ? " y " : "") + t1.getSeconds() + (t1.getSeconds() > 1 ? " segundos" : " segundo") : "");

            }
        }
    ]
});