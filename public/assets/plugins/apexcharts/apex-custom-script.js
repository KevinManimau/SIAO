$(function() {
    "use strict";


// chart 1

var options = {
            chart: {
                height: 350,
                type: 'line',
                zoom: {
                      enabled: false
                    },
                foreColor: '#f7af31',
                toolbar: {
                      show: false
                    },
                shadow: {
                    enabled: false,
                    color: '#000',
                    top: 3,
                    left: 2,
                    blur: 3,
                    opacity: 1
                },
            },
            stroke: {
                width: 4,   
                curve: 'smooth',
            },
            series: [{
                name: 'Transaksi',
                data: [89, 3, 10, 9, 29, 19, 22, 9, 12, 7, 19, 5, 13, 9, 17, 2, 7, 5],
            }],

            tooltip: {
                enabled: true,
                theme: 'dark',
            },

            xaxis: {
                type: 'datetime',
                categories: ['1/11/2000', '2/11/2000', '3/11/2000', '4/11/2000', '5/11/2000', '6/11/2000', '7/11/2000', '8/11/2000', '9/11/2000', '10/11/2000', '11/11/2000', '12/11/2000', '1/11/2001', '2/11/2001', '3/11/2001','4/11/2001' ,'5/11/2001' ,'6/11/2001'],
            },
            fill: {
                type: 'gradient',
                gradient: {
                    shade: 'dark',
                    gradientToColors: [ '#003066'],
                    shadeIntensity: 1,
                    type: 'horizontal',
                    opacityFrom: 1,
                    opacityTo: 1,
                    stops: [0, 0, 0, 0]
                },
            },
            colors: ["#fc00ff"],
            grid:{
                show: true,
                borderColor: 'rgba(66, 59, 116, 0.15)',
            },
            yaxis: {
                min: -10,
                max: 100,                
            }
        }

       var chart = new ApexCharts(
            document.querySelector("#chart1"),
            options
        );
        
        chart.render();

     });	