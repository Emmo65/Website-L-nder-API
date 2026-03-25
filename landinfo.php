<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landinfo</title>

    <style>
        body {
    background-color: #f5f5f5;
    font-family: Arial, sans-serif;
    margin: 0;
    }

    .karte {
    max-width: 500px;
    margin: 40px auto;
    background-color: white;
    padding: 20px;
    box-shadow: 0 0 10px gray;
    border-radius: 10px;
    text-align: center;
    }

    .karte img {
    width: 100%;
    margin: 15px 0;
    border-radius: 5px;
    }

    h1 {
    margin-bottom: 10px;
    }

    p {
    margin: 5px 0;
    }

    
    </style>

</head>
<body>
    <?php
    if (!isset($_GET["code"])) {
        echo "Kein Land ausgewählt";
        exit;
    }

    $code = $_GET["code"];
    $url = "https://restcountries.com/v3.1/alpha/" . $code;
    $daten = file_get_contents($url);
    $landanzeige = json_decode($daten, true);
    $land = $landanzeige[0];

?>

<div class="karte">
        <h1><?php echo $land["name"]["common"]; ?></h1>

        <img src="<?php echo $land["flags"]["png"]; ?>">

        <p>Hauptstadt: <?php echo $land["capital"][0]; ?></p>
        <p>Region: <?php echo $land["region"]; ?></p>
        <p>Bevölkerung: <?php echo $land["population"]; ?></p>
</div>
    
</body>
</html>