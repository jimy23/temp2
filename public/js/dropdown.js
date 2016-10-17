/*$("#institucion_codigoInstitucion").change(event => {
    $.get(`/auth/register/${event.target.value}`, function (res, sta) {
        $("#grupo_codigoGrupo").empty();
        console.log(response);
        res.forEach(element => {
            $("#grupo_codigoGrupo").append(`<option value=${element.codigoGrupo}>${element.codigoGrupo} </option>`);
        });
    });
});*/

$("#institucion_codigoInstitucion").change(event => {
    $.get(`/auth/register/${event.target.value}`, function(res, sta) {
        $("#grupo_codigoGrupo").empty();
        res.forEach(element => {
            $("#grupo_codigoGrupo").append(`<option value=${element.codigoGrupo}>${element.codigoGrupo}</option>`);
        });
    });
});