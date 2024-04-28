<?php
$APIKEY = "4f9d379c31b0e5934b2560c077ec2f30584943c1692a88d96d87cd5c94c23fbf";

$NEGARA = file_get_contents('https://apiv3.apifootball.com/?action=get_countries&APIkey=4f9d379c31b0e5934b2560c077ec2f30584943c1692a88d96d87cd5c94c23fbf');

$LAGA = file_get_contents('https://apiv3.apifootball.com/?action=get_leagues&APIkey=4f9d379c31b0e5934b2560c077ec2f30584943c1692a88d96d87cd5c94c23fbf');

$TIM_SPANYOL = file_get_contents('https://apiv3.apifootball.com/?action=get_teams&league_id=302&APIkey=4f9d379c31b0e5934b2560c077ec2f30584943c1692a88d96d87cd5c94c23fbf');

$PARSE_NEGARA = json_decode($NEGARA, true);

$PARSE_LAGA = json_decode($LAGA, true);

$PARSE_TIM_SPANYOL = json_decode($TIM_SPANYOL, true);

// echo $PARSE_NEGARA[0]['country_name'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Main Dashboard</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Fußball</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="EAI-futbol.php">Dashboard <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="https://apifootball.com/">Source</a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="container mt-5">
    <div class="row">
      <div class="col-md-4">
        <div class="card">
          <div class="card-header">
          Total Countries
          </div>
          <div class="card-body">
            <h5 class="card-title">
                <?php 
                echo count($PARSE_NEGARA);
                ?>
            </h5>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <div class="card-header">
          Total Leagues
          </div>
          <div class="card-body">
            <h5 class="card-title">
                <?php 
                echo count($PARSE_LAGA);
                ?>
            </h5>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <div class="card-header">
          Germany Leagues
          </div>
          <div class="card-body">
            <h5 class="card-title">12</h5>
          </div>
        </div>
      </div>
    </div>

    <div class="row mt-5">
      <div class="col-md-12">
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Countries</th>
              <th scope="col">Leagues</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $increment = 1;
            foreach($PARSE_NEGARA as $item){
            echo '<tr>';
            echo '<th scope="row">'.$increment.'</th>';
            echo '<td>'.$item['country_name'].'</td>';
            echo '<td></td>';
            echo '<td> <a href="teams.php?country_id='.$item['country_id'].'" class="btn btn-primary">See Details</a> </td>';
            echo '</tr>';

            $increment = $increment+1;
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
