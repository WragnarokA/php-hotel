<?php
$parkingFilter = ($_GET["parking"] == "si") ? true : false;
$voteFilter = $_GET["vote"];

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
$filterdHotels = $hotels;

if ($parkingFilter) {
    $nuvoArray = [];

    foreach ($hotels as $key => $albergo) {
        if ($albergo["parking"]) {
            $nuvoArray[] = $albergo;
        }
    }
    $filterdHotels = $nuvoArray;
}

if (isset($_GET["vote"]) &&  $_GET["vote"] !== "") {
    $nuvoArray = [];

    foreach ($filterdHotels as $albergo) {
        if ($albergo['vote'] >= $_GET["vote"]) {
            $nuvoArray[] = $albergo;
        }
    }
    $filterdHotels = $nuvoArray;
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Lista alberghi</title>

</head>

<body>

    <div class="container">
        <div class="row">

            <form action="hotel.php" method="GET">

                <div class="col-4">

                    <label for="parking" class=" bg-primary  text-light mt-5 ">Mostra alberghi: </label>
                    <select name="parking" id="parking" class="form-select  mt-3 ">
                        <option value="" selected>Tutti</option>
                        <option value="si">Alberghi con parcheggio</option>
                    </select>
                </div>
                <div class="col-4">

                    <label for="parking" class=" bg-primary  text-light mt-5 ">Voto: </label>
                    <input type="number" name="vote" id="vote" max="5" min="1">

                    </select>
                </div>

                <div class="col-12  mt-3">
                    <button type="submit" class="btn btn-primary">Invia</button>
                    <button type="reset" class="btn btn-primary">Cancella</button>
                </div>

            </form>
        </div>
    </div>


    <div class="container ">
        <h1 class=" mt-5 d-flex justify-content-center text-light" aria-current="true">Lista Alberghi</h1>
        <div class="col-12 BGcolor">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Descrizione</th>
                        <th scope="col">Parcheggio</th>
                        <th scope="col">Stelle</th>
                        <th scope="col">Distanza dal centro</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($filterdHotels as $albergo) { ?>
                        <?php  ?>
                        <tr>
                            <td> <?php echo $albergo['name'] ?></td>
                            <td> <?php echo $albergo['description'] ?></td>
                            <td> <?php echo ($albergo['parking']) ? "SI" : "NO" ?></td>
                            <td> <?php echo $albergo['vote'] ?></td>
                            <td> <?php echo $albergo['distance_to_center'] ?></td>
                        </tr>
                        <?php  ?>
                    <?php  } ?>
                </tbody>
            </table>

        </div>
    </div>

</body>

</html>