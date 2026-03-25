<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meine Länderseite</title>
<style>
    body {
        background-color: #f5f5f5;
    }

    .container {
        display: flex;
        flex-wrap: wrap;
    }

    .land {
        text-align: center;
        width: 200px;
        margin: 10px;
        padding: 5px;
        box-shadow: 0 0 10px gray;
    }

    .land img{
        width: 100%;
        margin-top: 5px;
    }

    .land:hover{
        transform: scale(1.05);
        transition: 0.2s;
    }

</style>

</head>
<body>
    <?php

    $url = "https://restcountries.com/v3.1/all?fields=name,flags";
    $daten =  file_get_contents($url);
    $laender = json_decode($daten,true);
    //echo $laender[0]["name"]["common"];
    echo "<div class='container'>";
        foreach($laender as $land){
            echo "<div class='land'>";
            echo $land["name"]["common"];
            echo "<br>";
            echo "<img src='" . $land["flags"]["png"] . "'>";
            echo "</div>";
        }

    echo "</div>";


    ?>
    
</body>
</html>