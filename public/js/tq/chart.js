
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
            }
        }
    });
}