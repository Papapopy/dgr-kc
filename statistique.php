<?php
    $username = "root";
    $password = "";
    $database = "espace_membre";

    try {
        $pdo = new PDO("mysql:host=localhost;database=$database", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e){
        die("ERROR: Non Connecté" .$e->getMessage());
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Graphique</title>
    <link rel="stylesheet" type="text/css" href="css/torrent1.css">
    <link rel="stylesheet" type="text/css" href="css/torrent2.css">
    <link rel="stylesheet" type="text/css" href="css/torrent3.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link href='/static/css/css_style.css' rel='stylesheet' type='text/css'>

        <style>
      * {
        margin: 0;
        padding: 0;
        font-family: sans-serif;
      }
      .chartMenu {
        width: 100vw;
        height: 40px;
        background: #1A1A1A;
        color: rgba(54, 162, 235, 1);
      }
      .chartMenu p {
        padding: 10px;
        font-size: 20px;
      }
      .chartCard {
        width: 100vw;
        height: calc(100vh - 40px);
        background: rgba(54, 162, 235, 0.2);
        display: flex;
        align-items: center;
        justify-content: center;
      }
      .chartBox {
        width: 700px;
        padding: 20px;
        border-radius: 20px;
        border: solid 3px rgba(54, 162, 235, 1);
        background: white;
      }
    </style>
        <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="logo">
                            <a href="index.php"><img src="images/logo2.png" alt="Torrent9" style="width: 125px"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<div class="navigation">
            <div class="container">
                <nav class="navbar navbar-default torent9-nav" style="border:0">
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li>
                                <a href="actualite.php" title="Actualités">Actualités</a>
                            </li>
                            <li>
                                <a href="document.php" title="Documentations">Documentations</a>
                            </li>
                            <li>
                                <a href="impot.php" title="Nos impots">Nos impots</a>
                            </li>
                            <li>
                                <a href="consulter_stat.php" title="Statistiques">Statistiques</a>
                            </li>
                            <li>
                                <a href="expolog/login.php" title="Télé-declarations">Télé-declarations</a>
                            </li>
                            <li>
                                <a href="contact.php" title="Contact">Contact</a>
                            </li>
                            <li>
                                <a href="apropos.php" title="Apropos">Apropos</a>
                            </li>                         
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </header>
</head>
<body>

    <?php 
        try{
            $sql = "SELECT * FROM espace_membre.month";
            $result = $pdo->query($sql);
            if($result->rowCount() > 0) {
                $realisation = array();
                
                while ($row = $result->fetch()) {
                    $realisation[] = $row["realisation"];   
                }
            unset($result);
            }
            else {
                echo "No records match";
            }
        } 
        catch(PDOException $e){
            die("ERROR: Could not able to" . $e->getMessage());
        }
        unset($pdo);
    ?>
<div class="chartMenu">
    </div>
    <div class="chartCard">
      <div class="chartBox">
        <canvas id="myChart"></canvas>
      </div>
    </div>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js/dist/chart.umd.min.js"></script>

    <script>
    // setup 

    const realisation = <?php echo json_encode($realisation); ?>
    
    const data = {
      labels: ['Jan', 'Fev', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet','Aout','Sept', 'Oct', 'Nov', 'déc'],
      datasets: [{
        label: 'Recettes 2023',
        data: realisation,
        backgroundColor: [
          'rgba(255, 26, 104, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(255, 159, 64, 0.2)',
          'rgba(0, 0, 0, 0.2)'
        ],
        borderColor: [
          'rgba(255, 26, 104, 1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(153, 102, 255, 1)',
          'rgba(255, 159, 64, 1)',
          'rgba(0, 0, 0, 1)'
        ],
        borderWidth: 2
      },]
    };

    // config 
    const config = {
      type: 'bar',
      data,
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    };

    // render init block
    const myChart = new Chart(
      document.getElementById('myChart'),
      config
    );

    // Instantly assign Chart.js version
    const chartVersion = document.getElementById('chartVersion');
    chartVersion.innerText = Chart.version;
    </script>
</body>
</html>