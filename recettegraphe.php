<?php
$connect = new PDO("mysql:host=127.0.0.1;dbname=espace_membre", "root", "");

$query = "SELECT year FROM chart_data GROUP BY year DESC";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Graphique</title>
    

   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <script src="https://code.jquery.com/jquery-1.12.4.js" integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU=" crossorigin="anonymous"></script>


</head>
<body>
    <br>
    <div class="container">
        <h3>Graphique de </h3>
        <br>
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                    <h3 class="panel-title">Recette x</h3>
                </div>
                <div class="col-md-3">
                    <select name="year" class="form-control" id="year">
                        <option>Choisir l'Année</option>
                        <?php 
                        foreach ($result as $row) 
                        {
                            echo '<option value="'.$row["year"].'">'.$row["year"].'</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="panel-body">
            <div id="chart_area" style="width: 1000px; height: 620px;"></div>
        </div>
    </div>
</body>
</html>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {packages: ['corechart', 'bar']});
    google.charts.setOnLoadCallback(drawChart);

    function load_monthwise_data(year, title)
    {
        var temp_title = title + ' '+year+'';
        $.ajax({
            url:"/fetch.php",
            method:"POST",
            data:{year:year},
            dataType:"JSON",
            success:function(data)
            {
                drawMonthwiseChart(data, temp_title);
            }
        });
    }

    function drawMonthwiseChart(chart_data, chart_main_title)
    {
        var jsonData = chart_data;
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Month');
        data.addColumn('number', 'Profit');
        $.each(jsonData, function(i, jsonData){
            var month = jsonData.month;
            var profit = parseFloat($.trim(jsonData.profit));
            data.addRows([[month, profit]]);
        });
        var options:
        {
            title:chart_main_title,
            hAxis: 
            {
                title: "Months"
            },
            vAxis: 
            {
                title: 'Profit'
            }
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('chart_area'));
        chart.draw(data, options);
    }

</script>
<script>
    $(document).ready(function(){

    $('#year').change(function(){
        var year = $(this).val();
        if(year != '')
        {
            load_monthwise_data(year, 'Recette Mensuelle');
        }
    });

    });
</script>