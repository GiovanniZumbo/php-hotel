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

$filteredHotels;

if (isset($_GET["parking"]) && $_GET["parking"] === "on") {
    $filteredHotels = [];

    foreach ($hotels as $hotel) {
        if ($hotel["parking"] === true) {
            array_push($filteredHotels, $hotel);
        }
    }
} else {
    var_dump("Voglio tutti i voti");
    $filteredHotels = $hotels;
}

// Voti

if (isset($_GET["vote"]) && ($_GET["vote"] >= 1  && $_GET["vote"] <= 5)) {
    $currentArray = [];

    foreach ($filteredHotels as $hotel) {

        if ($hotel["vote"] >= $_GET["vote"]) {
            array_push($currentArray, $hotel);
        }
    }
} else {
    var_dump("Voglio tutti i voti");
    $currentArray = $filteredHotels;
}

?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css' integrity='sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg==' crossorigin='anonymous' />
</head>

<body>
    <div class="container">
        <h1 class="text-center py-3">Hotels</h1>

        <!-- <ul>
            <?php foreach ($currentArray as $hotel) { ?>
                <li>Nome hotel: "<?= $hotel['name']; ?>"</li>
                <li>Descrizione hotel: <?= $hotel['description']; ?></li>
                <li>Parcheggio: <?= ($hotel['parking'] ? "Sì." : "No."); ?> </li>
                <li>Valutazione: <?= $hotel['vote']; ?>/5</li>
                <li>Distanza dal centro: <?= $hotel['distance_to_center']; ?>km.</li>

                <hr>
            <?php } ?>

        </ul> -->

        <div>
            <span>Parcheggio: </span>
            <form class="form-check form-check-inline ms-2" action="index.php" method="GET">
                <input class="form-check-input" type="checkbox" name="parking" id="parking">
                <label class=" form-check-label">Sì</label>
                <input type="number" name="vote" id="vote" min="0" max="5">
                <button class="btn btn-success ms-3" type="submit">Invia</button>
                <button class="btn btn-light ms-3 border-success" type="reset">Pulisci dati</button>
            </form>
        </div>

        <table class="table table-success table-hover text-center table-border border-success my-3">
            <thead>
                <tr>
                    <th scope="col">Hotel</th>
                    <th scope="col">Descrizione</th>
                    <th scope="col">Parcheggio</th>
                    <th scope="col">Valutazione</th>
                    <th scope="col">Distanza dal centro</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($currentArray as $hotel) { ?>
                    <tr>
                        <th scope="row">"<?= $hotel['name']; ?>"</th>
                        <td><?= $hotel['description']; ?></td>
                        <td><?= ($hotel['parking']) ? "Sì" : "No"; ?></td>
                        <td><?= $hotel['vote']; ?>/5</td>
                        <td><?= $hotel['distance_to_center']; ?>km</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

    </div>
</body>

</html>