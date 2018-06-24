var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');


function getReclamacao(){

    $.get({
        url: '/getReclamations',
       
        dataType: 'json',
        success: function(data) {

            data.forEach(element => {
                $("#tableBody").append(
                    "<tr id='" + element.id_consumidor + "'>"+
                    "<td>" + element.id_consumidor + "</td>" +
                    "<td>" + element.uf + "</td>" +
                    "<td>" + element.faixa_etaria + "</td>" +
                    "<td>" + element.area + "</td>" +
                    "<td>" + element.problema + "</td>" +
                    "<td>" + element.data_finalizacao + "</td>" +
                    "<td>" + element.situacao + "</td>" +
                    "<td>" + element.nome_comercial + "</td>" +
                    "<td> <button class='btn-danger' id='" + element.id_consumidor + "remove'>Apagar</button> </td>" +
                    "</tr>"
                )
                $('#' + element.id_consumidor + 'remove').on('click' , function(){
                    $('#' + element.id_consumidor).hide();
                })

            });

        },
        error: function(data) {
    
        }
    });
}

function cadastrarReclamacao()
{
    $("#saveReclamation").on('click', function(){
        $.post({
            url: '/saveReclamation',
            data : {
                _token: CSRF_TOKEN,
                uf: $("#ufInput").val(),
                faixa: $("#faixa").val(),
                cidade: $("#cidade").val(),
                area: $("#area").val(),
                assunto: $("#assunto").val(),
                problema: $("#problema").val(),
                dataFin: $("#dataFin").val(),
                situacao: $("#situacao").val(),
                empresa: $("#empresa").val()                
                

            },
            dataType: 'json',
            success: function(data) {
                $("#tableBody").prepend(
                    "<tr id='" + data.id_consumidor + "'>"+
                    "<td>" + data.id_consumidor + "</td>" +
                    "<td>" + data.uf + "</td>" +
                    "<td>" + data.faixa_etaria + "</td>" +
                    "<td>" + data.area + "</td>" +
                    "<td>" + data.problema + "</td>" +
                    "<td>" + data.data_finalizacao + "</td>" +
                    "<td>" + data.situacao + "</td>" +
                    "<td>" + data.nome_comercial + "</td>" +
                    "<td> <button class='btn-danger' id='" + data.id_consumidor + "remove'>Apagar</button> </td>" +
                    "</tr>"
                );

                $('#' + data.id_consumidor + 'remove').on('click' , function(){
                    $('#' + data.id_consumidor).hide();
                });

                $('#modalCadastrar').modal('hide');
            }
           
        });
    })
}

$(document).ready(function(){
    getReclamacao();
    cadastrarReclamacao();
})