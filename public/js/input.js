
$(document).ready(function(){
    populateUfInput();
    populateAreaInput();

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