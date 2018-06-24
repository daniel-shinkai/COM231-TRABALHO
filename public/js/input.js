
$(document).ready(function(){
    populateUfInput();
    populateAreaInput();
    populateRegionInput();
    populateSegmentoInput();
    populateFaixaEtaria();

    let today = new Date().toISOString().substr(0, 10);
    document.querySelector("#dateInput").value = today;
})



function populateUfInput(){

    $.get({
        url: '/getUf',
       
        dataType: 'json',
        success: function(data) {

            data.forEach(element => {
                $('#ufInput').append('<option value="' + element.uf + '">' + element.uf + '</option>')
            });

        },
        error: function(data) {
    
        }
    });
}

function populateAreaInput(){

    $.get({
        url: '/getArea',
       
        dataType: 'json',
        success: function(data) {

            data.forEach(element => {
                $('#areaInput').append('<option value="' + element.area + '">' + element.area + '</option>')
            });

        },
        error: function(data) {
    
        }
    });
}

function populateRegionInput(){

    $.get({
        url: '/getRegion',
       
        dataType: 'json',
        success: function(data) {

            data.forEach(element => {
                $('#regiao').append('<option value="' + element.regiao + '">' + element.regiao + '</option>')
            });

        },
        error: function(data) {
    
        }
    });
}

function populateSegmentoInput(){

    $.get({
        url: '/getSegmento',
       
        dataType: 'json',
        success: function(data) {

            data.forEach(element => {
                $('#segmento').append('<option value="' + element.segmento_mercado + '">' + element.segmento_mercado + '</option>')
            });

        },
        error: function(data) {
    
        }
    });
}

function populateFaixaEtaria(){

    $.get({
        url: '/getFaixaEtaria',
       
        dataType: 'json',
        success: function(data) {

            data.forEach(element => {
                $('#faixa').append('<option value="' + element.faixa_etaria + '">' + element.faixa_etaria + '</option>')
            });

        },
        error: function(data) {
    
        }
    });
}