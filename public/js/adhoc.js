var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

$(document).ready(function(){
    getAreaBySegment();
    getProblemaByArea();
    updateOnSituationChange();


    $("#pdfBar").on("click", function(){
        var imgData = document.getElementById('relatorioChart').toDataURL("image/png", 1.0);
        var pdf = new jsPDF();

        pdf.addImage(imgData, 'PNG', 0, 0, 200, 200);
        pdf.save("download.pdf");
    })
})

function getAreaBySegment(){
    $("#segmento").on('change', function(){
        $.post({
            url: '/getAreaBySegmento',
            data : {
                _token: CSRF_TOKEN,
                segmento: $("#segmento").val(),
                situacao: $("#situacao").val()
         
            },
            dataType: 'json',
            success: function(data) {

                $('#area').children('option:not(:first)').remove();

                for (let index = 0; index < 5; index++) {
                    barChart.data.labels.pop();
                    barChart.data.datasets.forEach((dataset) => {
                        dataset.data.pop();
                    });
                    barChart.update();
                }

                data.forEach(element => {
                    $('#area').append('<option value="' + element.area + '">' + element.area + '</option>')

                    barChart.options.title.text = $("#segmento").val();
    
                    barChart.data.labels.push(formatLabel(element.area, 15));
                    barChart.data.datasets.forEach((dataset) => {
                        dataset.data.push(element.quantidadeReclamacao);
                    });
                    barChart.update();

                });
            }
           
        });
    })
}

function getProblemaByArea(){
    $("#area").on('click', function(){
        
        $.post({
            url: '/getProblemaByArea',
            data : {
                _token: CSRF_TOKEN,
                area: $("#area").val(),
         
            },
            dataType: 'json',
            success: function(data) {

                barChart.options.title.text = "Problemas de " + $("#area").val();

                for (let index = 0; index < 5; index++) {
                    barChart.data.labels.pop();
                    barChart.data.datasets.forEach((dataset) => {
                        dataset.data.pop();
                    });
                    barChart.update();
                }

                data.forEach(element => {
                
                    barChart.data.labels.push(formatLabel(element.problema, 15));
                    barChart.data.datasets.forEach((dataset) => {
                        dataset.data.push(element.quantidadeReclamacao);
                    });
                    barChart.update();
                })
            }
           
        });
    })
}

function updateOnSituationChange(){
    $("#situacao").on('change', function(){
        if($("#area").val()){
            $.post({
                url: '/getProblemaByAreaAndSituation',
                data : {
                    _token: CSRF_TOKEN,
                    area: $("#area").val(),
                    situacao: $("#situacao").val()

                },
                dataType: 'json',
                success: function(data) {
    
                    barChart.options.title.text = "Problemas de " + $("#area").val();
    
                    for (let index = 0; index < 5; index++) {
                        barChart.data.labels.pop();
                        barChart.data.datasets.forEach((dataset) => {
                            dataset.data.pop();
                        });
                        barChart.update();
                    }
    
                    data.forEach(element => {
                    
                        barChart.data.labels.push(formatLabel(element.problema, 15));
                        barChart.data.datasets.forEach((dataset) => {
                            dataset.data.push(element.quantidadeReclamacao);
                        });
                        barChart.update();
                    })
                }
               
            });
        } else {
            $.post({
                url: '/getAreaBySegmento',
                data : {
                    _token: CSRF_TOKEN,
                    segmento: $("#segmento").val(),
                    situacao: $("#situacao").val()
             
                },
                dataType: 'json',
                success: function(data) {
    
                    $('#area').children('option:not(:first)').remove();
    
                    for (let index = 0; index < 5; index++) {
                        barChart.data.labels.pop();
                        barChart.data.datasets.forEach((dataset) => {
                            dataset.data.pop();
                        });
                        barChart.update();
                    }
    
                    data.forEach(element => {
                        $('#area').append('<option value="' + element.area + '">' + element.area + '</option>')
    
                        barChart.options.title.text = $("#segmento").val();
        
                        barChart.data.labels.push(formatLabel(element.area, 15));
                        barChart.data.datasets.forEach((dataset) => {
                            dataset.data.push(element.quantidadeReclamacao);
                        });
                        barChart.update();
    
                    });
                }
               
            });
        }
        
    })
}

var barConfig =  {
    type: 'line',
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
                    labelString: 'Area'
                  }
            }]
        },
        title: {
            display: true,
            text: '',
            fontSize: 35
          }
    }
}

var ctx_bar = document.getElementById('relatorioChart').getContext('2d');
var barChart = new Chart(ctx_bar, barConfig);

function formatLabel(str, maxwidth){
    var sections = [];
    var words = str.split(" ");
    var temp = "";

    words.forEach(function(item, index){
        if(temp.length > 0)
        {
            var concat = temp + ' ' + item;

            if(concat.length > maxwidth){
                sections.push(temp);
                temp = "";
            }
            else{
                if(index == (words.length-1))
                {
                    sections.push(concat);
                    return;
                }
                else{
                    temp = concat;
                    return;
                }
            }
        }

        if(index == (words.length-1))
        {
            sections.push(item);
            return;
        }

        if(item.length < maxwidth) {
            temp = item;
        }
        else {
            sections.push(item);
        }

    });

    return sections;
}