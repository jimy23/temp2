$("#institucion_codigoInstitucion").change(event => {
    $.get(`/admin/users/create/${event.target.value}`, function(res, sta) {
        $("#grupo_codigoGrupo").empty();
        res.forEach(element => {
            $("#grupo_codigoGrupo").append(`<option value=${element.codigoGrupo}>${element.codigoGrupo}</option>`);
        });
    });
});