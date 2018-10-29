
function TQ_Chart(elementID, title, chart_data) {
    chart_data['yAxes'][0]['display'] = true;
    return new Chart(document.getElementById(elementID).getContext('2d'), {
        type: 'bar',
        data: {
            labels: ["T1", "T2", "T3", "T4", "T5", "T6", "T7", "T8", "T9", "T10", "T11", "T12"],
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