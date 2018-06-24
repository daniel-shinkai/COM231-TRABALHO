function getReclamacao(){

    $.get({
        url: '/getReclamations',
       
        dataType: 'json',
        success: function(data) {

            data.forEach(element => {
                $("#tableBody").append(
                    "<tr>"+
                    "<td>" + element.id_consumidor + "</td>" +
                    "<td>" + element.uf + "</td>" +
                    "<td>" + element.faixa_etaria + "</td>" +
                    "<td>" + element.area + "</td>" +
                    "<td>" + element.problema + "</td>" +
                    "<td>" + element.data_finalizacao + "</td>" +
                    "<td>" + element.situacao + "</td>" +
                    "<td>" + element.nome_comercial + "</td>" +
                    "</tr>"
                )
            });

        },
        error: function(data) {
    
        }
    });
}

$(document).ready(function(){
    getReclamacao();
})