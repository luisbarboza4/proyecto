$('html').loading();
$(document).ready(function () {
    function clearModal() {
        $("#status").prop("checked", false);
        $("#lista-art #artc tbody").empty();
        $("#lista-art #message tbody").empty();
        $("#comentario").val("");
        $("#id_modal").val("0");
    }
    $("[data-dismiss]").click(clearModal);
    $("[data-toggle]").click(clearModal);
    function showModal(result) {
        clearModal();
        $("#status option[value='"+result.active+"']").prop("selected",true);
        $(result.items).each(function (i, e) {
            $("#lista-art #artc tbody").append(
                $('<tr>').append(
                    $('<td>').text(e.imagen))
                    .append(
                    $('<td>').text(e.size))
                    .append(
                    $('<td>').text(e.soporte))
                    .append(
                    $('<td>').text(e.cantidad))
                    .append(
                    $('<td>')
                        .data('src-image', e.ruta)
                        .append("<span class='glyphicon glyphicon-picture'></span>")
                        .click(function () {
                            window.open($(this).data("src-image"));
                        })

                    )
            )
        })
        $(result.comentarios).each(function (i, e) {
            $("#lista-art #message tbody").append(
                $('<tr>').append(
                    $('<td>').text(e.name+": "+e.mensaje))
            )
        })
        $("#id_modal").val(result.id);
        $('#myModal').modal('show');
    }
    $("#buscar").keyup(function () {
        filter = $(this).val().toUpperCase();
        $('#lista tbody tr').each(function (i, e) {
            if ($(e).find("td:first").html().toUpperCase().indexOf(filter) > -1) {
                $(e).show();
            } else {
                $(e).hide();
            }
        })
    });
    $("#status_select").change(function () {
        filter = $(this).val().toUpperCase();
        if (filter == "") {
            $('#lista tbody tr').show();
        } else {
            $('#lista tbody tr').each(function (i, e) {
                var td = $(e).find('td')[2];
                if ($(td).html().toUpperCase().indexOf(filter) > -1) {
                    $(e).show();
                } else {
                    $(e).hide();
                }
            })
        }

    });
    function filter() {
        filter = $(this).val().toUpperCase();
        $('#lista tbody tr').each(function (i, e) {
            if ($(e).find("td:first").html().toUpperCase().indexOf(filter) > -1) {
                $(e).show();
            } else {
                $(e).hide();
            }
        })
    }
    $("#save-modal").click(function () {
        $('#myModal').modal('hide');
        $('html').loading();
        $.ajax({
            url: "service/service.php/backend/carrito/items",
            type: "POST",
            data: {
                id: $("#id_modal").val(),
                status: $("#status").val(),
                message: $("#comentario").val()
            },
            success: function (data) {
                $('html').loading("stop");
                search()
            }
        });
    })
    function search() {
        $('html').loading();
        $.ajax({
            url: "service/service.php/backend/carrito/items",
            type: "GET",
            success: function (data) {
                $('html').loading("stop");
                var result = JSON.parse(data);
                $("#lista tbody").empty()
                $(result.response).each(function (i, e) {
                    var status = "";
                    switch(e.active){
                        case '0':
                            status = "Pendiente";
                            break;
                        case '1':
                            status = "Listo";
                            break;
                        case '3':
                            status = "Aceptado";
                            break;
                        case '4':
                            status = "Cancelado";
                            break;
                    }
                    $("#lista tbody").append(
                        $('<tr>').append(
                            $('<td>').text(e.nombre + " " + e.apellido))
                            .append(
                            $('<td>').text(e.email)
                            .css({"word-break":"break-word"}))
                            .append(
                            $('<td>').text(e.fecha))
                            .append(
                            $('<td>').text(status))
                            .append(
                            $('<td>').text(e.total))
                            .data("full-item", e)
                    );
                    $("#lista tbody tr:last").click(function () {
                        showModal($(this).data("full-item"));
                    })
                });
            }
        });
    }
    search();
    $("[href]").click(function () {
        $('html').loading();
    })
});