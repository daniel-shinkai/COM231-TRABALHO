var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');


$(document).ready(function(){

    var myChart = createNewChart();


    getChartData(myChart);
})

function getChartData(myChart){
    $('#getRegiaoChartData').on('click', function (){

        $.post({
            url: '/getReclamacaoPorRegiao',
            data: {
                _token: CSRF_TOKEN,
                segmento: $('#segmento').val(),
                regiao: $('#regiao').val(),
                dataFinal: $('#dateInput').val()
            },
            dataType: 'json',
            success: function(data) {

                myChart.destroy();
                myChart = createNewChart();

                data.forEach(element => {
                    myChart.data.labels.push(element.uf);
                    myChart.data.datasets.forEach((dataset) => {
                        dataset.data.push(element.quantidadeReclamacao);
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
                label: 'Número de Reclamações Por Região',
                data: [],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgb(91, 239, 108)'
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgb(91, 239, 108)'

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
                        labelString: 'Estado'
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