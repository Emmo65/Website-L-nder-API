<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LandSuche</title>
    <style>
        body {
        background-color: #f5f5f5;
        font-family: Arial, sans-serif;
        margin: 0;
        text-align: center;
        }

        form {
            margin-top: 30px;
        }

        input {
            padding: 10px;
            width: 200px;
            font-size: 16px;
        }

        button {
            padding: 10px;
            font-size: 16px;
            cursor: pointer;
        }

        .karte {
            max-width: 500px;
            margin: 30px auto;
            background-color: white;
            padding: 20px;
            box-shadow: 0 0 10px gray;
            border-radius: 10px;
        }

        .karte img {
            width: 100%;
            margin: 15px 0;
            border-radius: 5px;
        }
    </style>


</head>
<body>
    <form method="GET">
        <input type="text" name="land">
        <button>Suchen</button>
    </form>

   <?php
        if (isset($_GET["land"])) {
        $landname = $_GET["land"];

        $url = "https://restcountries.com/v3.1/name/" . urlencode($landname);
        $daten = file_get_contents($url);
        $land = json_decode($daten, true);
        $landinfo = $land[0];
    ?>
    
    <div class="karte">
        <h1><?php echo $landinfo["name"]["common"]; ?></h1>

        <img src="<?php echo $landinfo["flags"]["png"]; ?>">

        <p>Hauptstadt: <?php echo $landinfo["capital"][0]; ?></p>
        <p>Region: <?php echo $landinfo["region"]; ?></p>
        <p>Bevölkerung: <?php echo $landinfo["population"]; ?></p>
    </div>

    <?php
    }
    ?>
</body>
</html>