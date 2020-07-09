$(document).ready(function(){
    
    var URL = "http://localhost/SIMANTO/public/Transaksi/getDataTahunan";
    
    var dataArray;
    $.ajax({
        url: URL,
        type: "GET",
        dataType: "json",
        success: function (response) {
            return response;
        }
    }).then(result => {
        dataArray = result;
        console.log(dataArray);
    });
    
    var ctx = $('#perhitunganTahunan');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"],
            datasets: [{
                label: 'Nilai Transaksi',
                data: [12],
                backgroundColor:'rgba(54, 162, 235, 0.2)',
                borderColor:'rgba(54, 162, 235, 1)',
                fill: 'origin',
            borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
    });
})