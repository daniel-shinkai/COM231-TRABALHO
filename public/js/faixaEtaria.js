var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');


$(document).ready(function(){

    var myChart = createNewChart();


    getChartData(myChart);

    $("#pdfBar").on("click", function(){
        var imgData = document.getElementById('myChart').toDataURL("image/png", 1.0);
        var pdf = new jsPDF();

        pdf.addImage(imgData, 'PNG', 0, 0, 200, 200);
        pdf.save("download.pdf");
    })
})

function getChartData(myChart){
    $('#getChartData').on('click', function (){

        $.post({
            url: '/getFaixaEtariaChartData',
            data: {
                _token: CSRF_TOKEN,
                area: $('#areaInput').val(),
                situacao: $('#situacao').val(),
                foiAtendida: $('#foiSelecionado').val(),
                dataFinal: $('#dateInput').val()
            },
            dataType: 'json',
            success: function(data) {

                myChart.destroy();
                myChart = createNewChart();

                data.forEach(element => {
                    myChart.data.labels.push(element.faixa_etaria);
                    myChart.data.datasets.forEach((dataset) => {
                        dataset.data.push(element.totalReclamacao);
                    });
                  myChart.update();
                });

                // data.forEach(element => {
                //     myChart.data.labels.pop();
                //     myChart.data.datasets.forEach((dataset) => {
                //         dataset.data.pop();
                //     });
                // });

            },
            error: function(data) {
            }
        });
    })
}

function createNewChart(){

    var ctx = document.getElementById("myChart").getContext('2d');

    return new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [],
            datasets: [{
                label: 'Número de Reclamações',
                data: [],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true,
                        autoSkip:false
                    },
                    scaleLabel: {
                        display: true,
                        labelString: 'Quantidade de Reclamações'
                      }
                }],
                xAxes: [{
                    
                    scaleLabel: {
                        display: true,
                        labelString: 'Faixa Etária'
                      }
                }]
            },
            title: {
                display: true,
                text: 'Quantidade de reclamação por faixa etária'
              }
        }
    });
}