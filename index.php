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

    if (isset($_GET['parking']) ?? isset($_GET['vote'])) {
        $filtered_hotels = [];
    
        foreach ($hotels as $hotel) {
            if (isset($_GET['parking']) && $hotel['parking'] == $_GET['parking'] && isset($_GET['vote']) && $hotel['vote'] == $_GET['vote']) {
                $filtered_hotels[] = $hotel;
            } else{
                $hotels;
            }
    
        }
    
        $hotels = $filtered_hotels;
        //var_dump($hotels);
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
    <form method="GET" action="<?php echo $_SERVER['PHP_SELF']?>">
        <label for="parking">Parcheggio:</label>
        <input type="checkbox" name="parking" id="parking" value="1">

        <label for="vote">Voto:</label>
        <input type="number" name="vote" id="vote" min="1" max="5" step="1">
        
        <button type="submit">Filtra</button>
    </form>
    <h1 class=" text-uppercase">lista hotel</h1>

    <?php if (empty($hotels)){ ?>
        <p>La ricerca non è andata a buon fine.</p>
    <?php } else{  ?>

         <!-- ' foreach ' for print data hotels-->
        <?php foreach($hotels as $hotel) {?>
            <p><?php echo 'Nome:'. ' ' . $hotel['name'] ?></p>
            <p><?php echo 'Descrizione:'. ' ' . $hotel['description'] ?></p>
            <p><?php echo 'Parcheggio:'. ' ' . ($hotel['parking'] ? 'true' : 'false') ?></p>
            <p><?php echo 'Voto:'. ' ' . $hotel['vote'] ?></p>
            <p><?php echo 'Distanza dal centro:'. ' ' . $hotel['distance_to_center'] ?></p>
        <?php } ?> 

    <?php } ?>
      
</body>
</html>