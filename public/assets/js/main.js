$(document).ready(function() {



    //mostrar campos ocultos
    if ($("#Raza").val() === "other") {
        $("#raza").show();
        $("#razacr").show();
    }

    if ($("#cliente").val() === "nuevo") {
        $("#cedula").show();
        $("#nombre").show();
        $("#telefono").show();
    }




    $("#Raza").on('change', function() {

        if ($(this).val() === "other") {
            $("#raza").show();
            $("#razacr").show();
        } else {
            $("#raza").hide();
            $("#razacr").hide();
        }
    });
    $("#cliente").on('change', function() {

        if ($(this).val() === "nuevo") {
            $("#cedula").show();
            $("#nombre").show();
            $("#telefono").show();
        } else {
            $("#cedula").hide();
            $("#nombre").hide();
            $("#telefono").hide();
        }
    });

    if ($("#Estado").val() === "Tratado") {
        $("#Fecha2").show();
        $("#tratamiento").show();
    }
    $("#Estado").on('change', function() {

        if ($(this).val() === "Tratado") {
            $("#Fecha2").show();
            $("#tratamiento").show();
        } else {
            $("#Fecha2").hide();
            $("#tratamiento").hide();
        }
    });

    if ($("#Problema").val() === "SI") {
        $("#problema").show();
    }

    $("#Problema").on('change', function() {
        if ($(this).val() === "SI") {
            $("#problema").show();
        } else {
            $("#problema").hide();
        }
    });


    //recuperar valores antiguos de sesión

    if ($('#select-animal2').length) {
        if ($('#select-animal2').val() !== null) {
            onSelectAnimal2();
        }
    }

    if ($('#select-animal').length) {
        if ($('#select-animal').val() !== null) {
            onSelectAnimal();
        }
    }

    if ($('#select-animal4').length) {
        if ($('#select-animal4').val() !== null) {
            onSelectAnimal4();
        }
    }




    $("#select-actividad").on('change', function() {
        sessionStorage.setItem("oldactividad", $('#select-actividad').val());
    });
    $("#select-vacuna").on('change', function() {
        sessionStorage.setItem("oldvacuna", $('#select-vacuna').val());
    });

    $('#select-animal').on('change', onSelectAnimal11);
    $('#select-animal2').on('change', onSelectAnimal22);
    $('#select-animal3').on('change', onSelectAnimal3);
    $('#select-animal4').on('change', onSelectAnimal4);

    $('.confirmation').on('click', function() {
        return confirm('¿Seguro desea finalizar la gestación? esta opción es irreversible');
    });
    $('.confirmation2').on('click', function() {
        return confirm('¿Seguro desea finalizar la monta? esta opción es irreversible');
    });

});


function onSelectAnimal() {
    var animal_id = $('#select-animal').val();
    var vacuna = sessionStorage.getItem("oldvacuna");
    console.log(vacuna);
    console.log(animal_id);
    if (!animal_id) {
        $('#select-vacuna').html('<option value="" disabled="" selected="">Seleccione Vacuna: </option>');

    }

    $.get('/' + animal_id + '/vacunas', function(data) {
        var html_select = '<option value="" disabled="" selected="">Seleccione Vacuna: </option>';
        for (var i = 0; i < data.length; ++i)
            if (vacuna == data[i].vacuna_id) {
                html_select += '<option selected value="' + data[i].vacuna_id + '"> ' + data[i].vacuna_nombre + '</option>';
            } else {
                html_select += '<option value="' + data[i].vacuna_id + '"> ' + data[i].vacuna_nombre + '</option>';
            }
        $('#select-vacuna').html(html_select);

    });
}

function onSelectAnimal11() {
    var animal_id = $('#select-animal').val();
    sessionStorage.removeItem("oldvacuna");
    if (!animal_id) {
        $('#select-vacuna').html('<option value="" disabled="" selected="">Seleccione Vacuna: </option>');

    }
    $.get('/' + animal_id + '/vacunas', function(data) {
        var html_select = '<option value="" disabled="" selected="">Seleccione Vacuna: </option>';
        for (var i = 0; i < data.length; ++i)
            html_select += '<option value="' + data[i].vacuna_id + '"> ' + data[i].vacuna_nombre + '</option>';
        $('#select-vacuna').html(html_select);

    });
}

function onSelectAnimal2() {
    var animal_id = $('#select-animal2').val();
    var actividad = sessionStorage.getItem("oldactividad");
    console.log(actividad);
    if (!animal_id)
        $('#select-actividad').html('<option value="" disabled="" selected="">Seleccione Actividad: </option>');

    $.get('/' + animal_id + '/actividades', function(data) {
        var html_select = '<option value="" disabled="" selected="">Seleccione Actividad: </option>';
        for (var i = 0; i < data.length; ++i)
            if (actividad == data[i].actividades_id) {
                html_select += '<option selected  value="' + data[i].actividades_id + ' "> ' + data[i].actividades_nombre + '</option>';
            } else {
                html_select += '<option value="' + data[i].actividades_id + '"> ' + data[i].actividades_nombre + '</option>';
            }
        $('#select-actividad').html(html_select);

    });
}

function onSelectAnimal22() {
    var animal_id = $('#select-animal2').val();
    sessionStorage.removeItem("oldactividad");
    if (!animal_id)
        $('#select-actividad').html('<option value="" disabled="" selected="">Seleccione Actividad: </option>');

    $.get('/' + animal_id + '/actividades', function(data) {
        var html_select = '<option value="" disabled="" selected="">Seleccione Actividad: </option>';
        for (var i = 0; i < data.length; ++i)
            html_select += '<option value="' + data[i].actividades_id + '"> ' + data[i].actividades_nombre + '</option>';
        $('#select-actividad').html(html_select);

    });
}

function onSelectAnimal4() {
    var animal_id = $('#select-animal4').val();
    var input = document.getElementById("ordeño");

    var input2 = document.getElementById("Ordeño_parto")
    if (!animal_id)
        input.min = this.value;
    $.get('/' + animal_id + '/ordeno', function(data) {
        input.min = data.partos_fecha;
        var max = new Date(data.partos_fecha);
        max.setDate(max.getDate() + 300);

        input.max = max.toISOString().substring(0, 10);;
        input2.value = data.partos_id;
        console.log("parto max" + max.toISOString().substring(0, 10));
        console.log("parto id" + data.partos_id);

    });
}


function onSelectAnimal3() {
    var animal_id = $(this).val();
    if (!animal_id)
        $('#peso').val("");
    $('#dieta').val("");


    $.get('/' + animal_id + '/nutricion', function(data) {
        $('#peso').val(data);
        var materia_seca = (data * 3.5) / 100;

        var pasto = (data * 10) / 100;
        var lista = "cantidad de materia seca: " + materia_seca + " KG \n cantidad de pasto: " + pasto + " KG";
        $('#dieta').val(lista);

    });
}
(jQuery);