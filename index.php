<?php

    $hotels = [

        [
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere Descrizione',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 10.4
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 2
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare Descrizione',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 1
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista Descrizione',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50
        ],

    ];
        // verify to both filters set
        if (isset($_GET['parking']) && isset($_GET['vote'])) {
            $filtered_hotels = [];
        
            foreach ($hotels as $hotel) {
                if ($hotel['parking'] == $_GET['parking'] && $hotel['vote'] >= $_GET['vote']) {
                    $filtered_hotels[] = $hotel;
                }
            }
        
            $hotels = $filtered_hotels;
        }
        // verify to only parking is set
        elseif (isset($_GET['parking'])) {
            $filtered_hotels = [];
        
            foreach ($hotels as $hotel) {
                if ($hotel['parking'] == $_GET['parking']) {
                    $filtered_hotels[] = $hotel;
                }
            }
        
            $hotels = $filtered_hotels;
        }
        // verify to only vote is set
        elseif (isset($_GET['vote'])) {
            $filtered_hotels = [];
        
            foreach ($hotels as $hotel) {
                if ($hotel['vote'] >= $_GET['vote']) {
                    $filtered_hotels[] = $hotel;
                }
            }
        
            $hotels = $filtered_hotels;
        }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>PHP Hotel</title>
</head>
<body>
    <div class="container flex-column d-flex align-items-center py-5 pb-5">

        <h1 class=" text-uppercase">lista hotel</h1>

        <form method="GET" action="<?php echo $_SERVER['PHP_SELF']?>">
            <label for="parking">Parcheggio:</label>
            <input type="checkbox" name="parking" id="parking" value="true">


            <label for="vote">Voto:</label>
            <input type="number" name="vote" id="vote" min="1" max="5">
            
            <button type="submit">Filtra</button>
        </form>
    </div>
        <?php if (empty($hotels)){ ?>
            <p class="text-center text-uppercase text-danger fw-semibold">La ricerca non è andata a buon fine.</p>
        <?php } else{  ?>
            <div class="container d-flex justify-content-center">
                <!-- ' foreach ' for print data hotels-->
                <?php foreach($hotels as $hotel) {?>
                    <div class="card m-2" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo 'Nome:'. ' ' . $hotel['name'] ?></h5>
                            <h6 class="card-subtitle mb-2 text-body-secondary"><?php echo 'Descrizione:'. ' ' . $hotel['description'] ?></h6>
                            <p class="card-text"><?php echo 'Parcheggio:'. ' ' . ($hotel['parking'] ? 'true' : 'false') ?></p>
                            <p class="card-text"><?php echo 'Voto:'. ' ' . $hotel['vote'] ?></p>
                            <p class="card-text"><?php echo 'Distanza dal centro:'. ' ' . $hotel['distance_to_center'] ?></p>
                        </div>
                    </div>
                    
                <?php } ?> 
            </div>

        <?php } ?>


    
      
</body>
</html>