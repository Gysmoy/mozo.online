function fn_ubigeo_departamento(cboid, opcionxdefecto) {
    const unicos = [];
    $('#' + cboid).empty();
    $.getJSON('assets/json/ubigeo.json', function (data) {
        $("#" + cboid).append('<option>- Escoja un departamento -</option>');
        data.forEach(datos => {
            if (!unicos.includes(datos.cod_dpto_gw)) {
                unicos.push(datos.cod_dpto_gw);
                $("#" + cboid).append('<option value="' + datos.cod_dpto_gw + '">' + datos.dpto_gw + '</option>');
            }
        });
        if (opcionxdefecto != null) $('#' + cboid).val(opcionxdefecto);
    })
}
function fn_ubigeo_prov(cboid, opcionxdefecto, coddepartamento) {
    const unicos = [];
    $('#' + cboid).empty();
    $.getJSON('assets/json/ubigeo.json', function (data) {
        $("#" + cboid).append('<option>- Escoja una provincia -</option>');
        data.forEach(datos => {
            if (datos.cod_dpto_gw == coddepartamento) {
                if (!unicos.includes(datos.prov_gw)) {
                    unicos.push(datos.prov_gw);
                    $("#" + cboid).append('<option value="' + datos.prov_gw + '">' + datos.prov_gw + '</option>');
                }
            }
        })
        if (opcionxdefecto != null) $('#' + cboid).val(opcionxdefecto);
    })
}
function fn_ubigeo_dist(cboid, opcionxdefecto, codprovincia) {
    const unicos = [];
    $('#' + cboid).empty();
    $.getJSON('assets/json/ubigeo.json', function (data) {
        $("#" + cboid).append('<option>- Escoja un distrito</option>');
        data.forEach(datos => {
            if (datos.prov_gw == codprovincia) {
                if (!unicos.includes(datos.dist_gw)) {
                    unicos.push(datos.dist_gw);
                    $("#" + cboid).append('<option value="' + datos.dist_gw + '">' + datos.dist_gw + '</option>');
                }
            }
        });
        if (opcionxdefecto != null) $('#' + cboid).val(opcionxdefecto);
    })
}
$(document).ready(function() {
    fn_ubigeo_departamento('depa', null);
})
$('#depa').change(function() {
    var departamento = $(this).val();
    fn_ubigeo_prov('prov', null, departamento);
    $('#prov').trigger('change');
})
$('#prov').change(function() {
    var provincia = $(this).val();
    fn_ubigeo_dist('dist', null, provincia)
})