var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
var labelName;
var barLabelName;


var doughnutConfig = {
    type: 'doughnut',
    data: {
        datasets: [{
            data: [
            
            ],
            backgroundColor: [
                'rgba(255, 99, 132)',
                'rgba(54, 162, 235)',
                'rgba(255, 206, 86)',
                'rgba(75, 192, 192)',
                'rgba(153, 102, 255)',
                'rgba(255, 159, 64)'
            ],
            label: 'Dataset 1'
        }],
        labels: [
           
        ]
    },
    options: {
        responsive: true,
        legend: {
            position: 'top',
        },
        title: {
            display: true,
            text: 'Quantidade de Reclamações por Área',
            fontSize: 35
        },
        animation: {
            animateScale: true,
            animateRotate: true
        }      
       
    }
};

var barConfig =  {
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
                    labelString: 'Problema'
                  }
            }]
        },
        title: {
            display: true,
            text: 'Quantidade de Reclamação por Problema',
            fontSize: 35
          }
    }
}

var lineConfig = {
    type: 'line',
    data: {
        labels: [],
        datasets: [{
            label: 'Quantidade de Reclamações Por Região',
            backgroundColor: 'rgb(0,191,255)',
            borderColor: 'rgb(0,191,255)',
            data: [
              
            ],
            fill: false,
        }]
    },
    options: {
        responsive: true,
        title: {
            display: true,
            text: 'Chart.js Line Chart',
            fontSize: 35

        },
        tooltips: {
            mode: 'index',
            intersect: false,
        },
        hover: {
            mode: 'nearest',
            intersect: true
        },
        scales: {
            xAxes: [{
                display: true,
                scaleLabel: {
                    display: true,
                    labelString: 'Região'
                }
            }],
            yAxes: [{
                display: true,
                scaleLabel: {
                    display: true,
                    labelString: 'Quantidade de Reclamações'
                }
            }]
        }
    }
};


var ctx = document.getElementById('chart-area').getContext('2d');
var myDoughnut = new Chart(ctx, doughnutConfig);

var ctx_bar = document.getElementById('bar-chart-area').getContext('2d');
var barChart = new Chart(ctx_bar, barConfig);

var ctx_line = document.getElementById('line-chart-area').getContext('2d');
var myLine = new Chart(ctx_line, lineConfig);

document.getElementById("chart-area").onclick = function(e) 
{
    var activeIndex = myDoughnut.tooltip._lastActive[0]._index;
    labelName = myDoughnut.data.labels[activeIndex];

    //$('#lastChart').show();
    
    $.post({
        url: '/getProblemaByArea',
        data : {
            _token: CSRF_TOKEN,
            area:labelName,
        },
        dataType: 'json',
        success: function(data) {

            $("#barChartDiv").removeClass('d-none');
            
            $('html, body').animate({
                scrollTop: $("#barChartDiv").offset().top
              }, 1000);
             
            barChart.options.title.text = "Problemas de " + labelName;

            data.forEach(element => {
                barChart.data.labels.pop(element.problema.substring(0, 20));
                barChart.data.datasets.forEach((dataset) => {
                    dataset.data.pop(element.quantidadeReclamacao);
                });
                barChart.update();
            });

            data.forEach(element => {
                
                barChart.data.labels.push(element.problema.substring(0, 20));
                barChart.data.datasets.forEach((dataset) => {
                    dataset.data.push(element.quantidadeReclamacao);
                });
                barChart.update();
            })

       
        }
       
    });
};


document.getElementById("bar-chart-area").onclick = function(e) 
{
    var activeIndex = barChart.tooltip._lastActive[0]._index;
    barLabelName = barChart.data.labels[activeIndex];
    
    $.post({
        url: '/getReclamacaoPorRegiaoEProblema',
        data : {
            _token: CSRF_TOKEN,
            problema: barLabelName,
            regiao: $('#regiao').val(),
            finalizada: $('#situacao').val()
        },
        dataType: 'json',
        success: function(data) {

            $("#lineChartDiv").removeClass('d-none');
            
            $('html, body').animate({
                scrollTop: $("#lineChartDiv").offset().top
              }, 1000);

            myLine.options.title.text =  $('#situacao').val() + ': Região ' +  $('#regiao').val();
    
            for (let index = 0; index < 10; index++) {
                myLine.data.labels.pop();
                myLine.data.datasets.forEach((dataset) => {
                    dataset.data.pop();
                });
                myLine.update();
                
            }

            data.forEach(element => {
                
                myLine.data.labels.push(element.uf);
                myLine.data.datasets.forEach((dataset) => {
                    dataset.data.push(element.quantidadeReclamacao);
                });
                myLine.update();
            })
       
        }
       
    });
};


function getDoghnutChartData(){

    $.get({
        url: '/getReclamationByArea',
       
        dataType: 'json',
        success: function(data) {

            data.forEach(element => {
                myDoughnut.data.labels.push(element.area);
                myDoughnut.data.datasets.forEach((dataset) => {
                    dataset.data.push(element.totalReclamacao);
                });
                myDoughnut.update();
            })

            $("#pdfDoghnut").on("click", function(){
                var imgData = document.getElementById('chart-area').toDataURL("image/png", 1.0);
                var pdf = new jsPDF();

                pdf.addImage(imgData, 'JPEG', 0, 0);
                pdf.save("download.pdf");
            })

        },
        error: function(data) {
    
        }
    });
}



$(document).ready(function(){
    getDoghnutChartData();


})



    