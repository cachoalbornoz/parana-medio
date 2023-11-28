$('#departamenton').on('change', function () {

    var departamento = $(this).val();

    var direccion = APP_URL + '/ciudad/buscarciudadn';

    $.ajax({

        url: direccion + '/' + departamento,
        type: 'GET',
        dataType: 'json',
        success: function (data) {

            $('select[name="ciudadn"]').empty();

            $('select[name="ciudadn"]').append('<option value="" selected disabled>' + '...' + '</option>');

            $.each(data.ciudad, function (index, ciudad) {

                $('select[name="ciudadn"]').append('<option value="' + ciudad.id + '">' + ciudad.nombre + '</option>');

            });
        }
    });
})


$('#provincian').on('change', function () {

    var provincia = $(this).val();

    var direccion = APP_URL + '/ciudad/buscardepartamento';

    $.ajax({

        url: direccion + '/' + provincia,
        type: 'GET',
        dataType: 'json',
        success: function (data) {

            $('select[name="departamenton"]').empty();

            $('select[name="departamenton"]').append('<option value="" selected disabled>' + '...' + '</option>');

            $.each(data.departamento, function (index, departamento) {

                $('select[name="departamenton"]').append('<option value="' + departamento.id + '">' + departamento.nombre + '</option>');

            });
        }
    });
})


$('#provincia').on('change', function () {


    var provincia = $(this).val();

    var direccion = APP_URL + '/ciudad/buscarciudad';

    $.ajax({

        url: direccion + '/' + provincia,
        type: 'GET',
        dataType: 'json',
        success: function (data) {

            $('select[name="ciudad"]').empty();

            $.each(data.ciudad, function (index, ciudad) {

                $('select[name="ciudad"]').append('<option value="' + ciudad.id + '">' + ciudad.nombre + '</option>');

            });

        }
    });

})

function imposeMinMax(el) {
    if (el.value != "") {
        if (parseInt(el.value) < parseInt(el.min)) {
            el.value = el.min;
        }
        if (parseInt(el.value) > parseInt(el.max)) {
            el.value = el.max;
        }
    }
}

$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('[data-toggle="tooltip"]').tooltip();

    $('input[type=text]').attr('autocomplete', 'off');
    $('input[type=number]').attr('autocomplete', 'off');
    $('input[type=email]').attr('autocomplete', 'off');

})

$(".file").fileinput({
    language: 'es',
    dropZoneEnabled: false
});

$(window).scroll(function () {

    if ($(this).scrollTop() >= ($(this).height() / 50)) {
        $("#spopup").show("slow");
    } else {
        $("#spopup").hide("slow");
    }

    if ($(this).scrollTop() > 130) {

        $('#navbar_top').removeClass("navbar-top");
        $('#navbar_top').addClass("fixed-top");
        $('#navbar_top').addClass("shadow");
        $('#navbar_top').addClass("nav-opacity");

        $('#navbar_top-brand').removeClass("d-none");

    } else {

        $('#navbar_top').addClass("navbar-top");
        $('#navbar_top').removeClass("fixed-top");
        $('#navbar_top').removeClass("shadow");
        $('#navbar_top').removeClass("nav-opacity");

        $('#navbar_top-brand').addClass("d-none");

    }
});

// BARRA NAVEGACION / SUBMENUES

$('.dropdown-menu a.dropdown-toggle').on('click', function (e) {
    var $el = $(this);
    var $parent = $(this).offsetParent(".dropdown-menu");
    if (!$(this).next().hasClass('show')) {
        $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
    }
    var $subMenu = $(this).next(".dropdown-menu");
    $subMenu.toggleClass('show');

    $(this).parent("li").toggleClass('show');

    $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function (e) {
        $('.dropdown-menu .show').removeClass("show");
    });

    if (!$parent.parent().hasClass('navbar-nav')) {
        $el.next().css({ "top": $el[0].offsetTop, "left": $parent.outerWidth() - 4 });
    }

    return false;
});

function baseURL(url) {
    return '{{ url("/")}}' + url;
};

function eliminarRegistro(id, ruta) {

    var token = $('input[name=_token]').val();

    ymz.jq_confirm({
        title: "Elimina registro ?",
        text: "<br>",
        no_btn: "No",
        yes_btn: "Si",
        no_fn: function () {

            return false;
        },
        yes_fn: function () {

            $.ajax({
                url: ruta,
                headers: { 'X-CSRF-TOKEN': token },
                method: 'POST',
                dataType: 'json',
                data: { id: id },

                success: function () {
                    $("#fila" + id).remove();
                }
            })
        }
    })
}

// check if the element is empty or not
function checkEmpty(elem) {
    if (elem.val() === '') {
        elem.addClass('empty border-info');
    } else {
        elem.removeClass('empty border-info');
    }
}

// listen for when the input/select change
$('input, textarea, select').on('change keyup', function () {
    checkEmpty($(this));
});

// loop through the elements when the page loads
$('input, textarea, select').each(function () {
    checkEmpty($(this));
});

$('#mostrar').on('click', function () {

    var x = $("#password").attr("type");

    if (x === "password") {

        $("#password").attr("type", "text");

    } else {

        $("#password").attr("type", "password");
    }
});


/*
$(document).ready(function () {
    const timeout = 600000;  // 600000 ms = 10 minutes
    var idleTimer = null;
    $('*').bind('mousemove click mouseup mousedown keydown keypress keyup submit change mouseenter scroll resize dblclick', function () {
        clearTimeout(idleTimer);

        idleTimer = setTimeout(function () {
            document.getElementById('logout-form').submit();
        }, timeout);
    });
    $("body").trigger("mousemove");
});

*/
