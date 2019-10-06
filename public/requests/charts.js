$(document).ready(function(){
    $.ajax({
        url: url_base + '/api/charts/bonds',
        method: 'GET',
        headers: {"Authorization" : "Bearer "+ Cookies.get('access_token')},
        success: function (response, status, xhr) {
            bondChart(response);
        },
        error: function (e) {
            console.error('server-side failure with status code ' + e.status);
            console.error("Não foi possível carregar os dados");
        }
    });

    $.ajax({
        url: url_base + '/api/charts/types',
        method: 'GET',
        headers: {"Authorization" : "Bearer "+ Cookies.get('access_token')},
        success: function (response, status, xhr) {
            typeChart(response);
        },
        error: function (e) {
            console.error('server-side failure with status code ' + e.status);
            console.error("Não foi possível carregar os dados");
        }
    });
});

function bondChart(response){
    var ctx = document.getElementById('myChart').getContext('2d');

    var myChart = new Chart(ctx, {
        responsive:true,
        type: 'pie',
        data: {
            labels: Object.keys(response),
            datasets: [{
                label: '# of Votes',
                data: Object.values(response),
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
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
            title: {
                display: true,
                text: 'Profissionais por Vínculo'
            }
        }
    });
}

function typeChart(response){
    var ctx2 = document.getElementById('myChart2').getContext('2d');
    var myChart2 = new Chart(ctx2, {
        type: 'bar',
        data: {
            labels: Object.keys(response),
            datasets: [{
                label: '# of Votes',
                data: Object.values(response),
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 121, 120, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(255, 121, 120, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            },
            title: {
                display: true,
                text: 'Profissionais por tipo de vínculo'
            }
        }
    });
}