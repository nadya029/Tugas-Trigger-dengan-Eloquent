@extends('layouts.apps')
@section('content')

<!DOCTYPE html>

<html>

<head>

    <title>Laravel 8 Highcharts Example - ItSolutionStuff.com</title>

</head>

   

<body>

<h1>Grafik Data Barang</h1>

<div id="container"></div>
</body>

  

<script src="https://code.highcharts.com/highcharts.js"></script>

<script type="text/javascript">

var stok =  <?php echo json_encode($jml) ?>;
var barang =  <?php echo json_encode($brg) ?>;

   

    Highcharts.chart('container', {

        title: {

            text: 'New User Growth, 2019'

        },

        chart: {
        type: 'column'
    },

        subtitle: {

            text: 'Source: itsolutionstuff.com.com'

        },

         xAxis: {

            categories:barang

        },

        yAxis: {

            title: {

                text: 'Number of New Users'

            }

        },

        legend: {

            layout: 'vertical',

            align: 'right',

            verticalAlign: 'middle'

        },

        plotOptions: {

            series: {

                allowPointSelect: true

            }

        },

        series: [{

            name: 'New Users',

            data:stok

        }],

        responsive: {

            rules: [{

                condition: {

                    maxWidth: 500

                },

                chartOptions: {

                    legend: {

                        layout: 'horizontal',

                        align: 'center',

                        verticalAlign: 'bottom'

                    }

                }

            }]

        }

});

</script>

</html>

@stop