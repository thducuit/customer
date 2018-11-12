
function TQ_Chart(elementID, title, chart_data, labels) {
    if(!chart_data || chart_data.length === 0 || !labels) return;
    chart_data['yAxes'][0]['display'] = true;
    return new Chart(document.getElementById(elementID).getContext('2d'), {
        type: 'bar',
        data: {
            labels: labels,
            datasets: chart_data['datasets']
            
        },
        options: {
            responsive: true,
            title: {
                display: true,
                text: title,
                fontSize: 15
            },
            legend: {
                position: 'bottom'
            },
            scales: {
                yAxes: chart_data['yAxes']
            },
            hover: {
                animationDuration: 0
            },
            animation: {
                duration: 1,
                onComplete: function () {
                    var chartInstance = this.chart,
                        ctx = chartInstance.ctx;
                    
                    ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, Chart.defaults.global.defaultFontStyle, Chart.defaults.global.defaultFontFamily);
                    ctx.textAlign = 'center';
                    ctx.textBaseline = 'bottom';

                    this.data.datasets.forEach(function (dataset, i) {
                        var meta = chartInstance.controller.getDatasetMeta(i);
                        meta.data.forEach(function (bar, index) {
                            var data = dataset.data[index]; 
                            if(data) {
                                ctx.fillText(data, bar._model.x, bar._model.y - 5);
                            }   
                        });
                    });
                }
            },
            tooltips: {
                "enabled": false
            }
        }
    });
}