
var chart1 = new Chart(document.getElementById("chart1").getContext('2d'), {
    type: 'bar',
    data: {
        labels: ["T1", "T2", "T3", "T4", "T5", "T6", "T7", "T8", "T9", "T10", "T11", "T12"],
        datasets: [
            {
                label: 'Hosting',
                data: [12, 19, 3, 5, 2, 3, 1, 11, 111, 54, 13, 89],
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255,99,132,1)',
                yAxisID: 'y-axis-1',
                borderWidth: 1
            },
            {
                label: 'Server',
                data: [12, 19, 3, 5, 2, 3, 1, 11, 111, 54, 13, 89],
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                yAxisID: 'y-axis-2',
                borderWidth: 1
            },
            {
                label: 'G-Store',
                data: [12, 19, 3, 5, 2, 3, 1, 11, 111, 54, 13, 89],
                backgroundColor: 'rgba(255, 206, 86, 0.2)',
                borderColor: 'rgba(255, 206, 86, 1)',
                yAxisID: 'y-axis-3',
                borderWidth: 1
            },
            {
                label: 'Domain',
                data: [12, 19, 3, 5, 2, 3, 1, 11, 111, 54, 13, 89],
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                yAxisID: 'y-axis-4',
                borderWidth: 1
            }
        ]
    },
    options: {
        responsive: true,
        title: {
            display: true,
            text: 'Expected Sales'
        },
        scales: {
            yAxes: [
                {
                    type: 'linear', 
                    display: true,
                    position: 'left',
                    id: 'y-axis-1',
                },
                {
                    type: 'linear', 
                    display: false,
                    // position: 'left',
                    id: 'y-axis-2',
                },
                {
                    type: 'linear', 
                    display: false,
                    // position: 'left',
                    id: 'y-axis-3',
                },
                {
                    type: 'linear', 
                    display: false,
                    // position: 'right',
                    id: 'y-axis-4',
                }
            ]
        }
    }
});