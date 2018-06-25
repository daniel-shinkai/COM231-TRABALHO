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

                myChart.options.title.text = "Reclamações do segmento " + $('#segmento').val();

                data.forEach(element => {
                    myChart.data.labels.push(element.uf);
                    myChart.data.datasets.forEach((dataset) => {
                        dataset.data.push(calculateRatio(element.uf, element.quantidadeReclamacao));
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
                        labelString: 'Quantidade de Reclamações a cada 10000 habitantes'
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
                fontSize: 35,
                text: 'Quantidade de reclamação'
              }
        }
    });
}

function calculateRatio(uf, total){
    var ratio = 10000;
    //alert(uf);
    switch(uf){
        case 'AC':
            return total / 829619 * ratio;
            break;
        case 'AL':
            return total / 3375823 * ratio;
            break;
        case 'AM':
            return total / 4063614 * ratio;
            break;
        case 'AP':
            return total / 797722 * ratio;
            break;
        case 'BA':
            return total / 15344447 * ratio;
            break;
        case 'CE':
            return total / 9020460 * ratio;
            break;
        case 'DF':
            return total / 3039444 * ratio;
            break;
        case 'ES':
            return total / 4016356 * ratio;
            break;
        case 'GO':
            return total / 6778772 * ratio;
            break;
        case 'MA':
            return total / 7000229 * ratio;
            break;
        case 'MG':
            return total / 21119536 * ratio;
            break;
        
        case 'MS':
            return total / 2713147 * ratio;
            break;
        case 'MT':
            return total / 3344544 * ratio;
            break;
        case 'PA':
            return total / 8366628 * ratio;
            break;
        case 'PB':
            return total / 4025558 * ratio;
            break;
        case 'PE':
            return total / 9473266 * ratio;
            break;
        case 'PI':
            return total / 3219257 * ratio;
            break;
        case 'PR':
            return total / 11320892 * ratio;
            break;
        case 'RJ':
            return total / 16718956 * ratio;
            break;
        case 'RN':
            return total / 3507003 * ratio;
            break;
        case 'RO':
            return total / 1805788 * ratio;
            break;
        case 'RR':
            return total / 522636 * ratio;
            break;
        

        case 'RS':
            return total / 11322895 * ratio;
            break;
        case 'SC':
            return total / 7001161 * ratio;
            break;
        case 'SE':
            return total / 2288116 * ratio;
            break;
        case 'SP':
            return total / 45094866 * ratio;
            break;
        case 'TO':
            return total / 1550194 * ratio;
            break;
        
    }
}

