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
        transition: 0.2s;
    }

    .land:hover{
        transform: scale(1.05);
        
    }

    a {
    text-decoration: none;
    color: black;
    display: block;
}

</style>

</head>
<body>
    <?php

    $url = "https://restcountries.com/v3.1/all?fields=name,flags,cca";
    $daten =  file_get_contents($url);
    $laender = json_decode($daten,true);
    echo "<div class='container'>";
        foreach($laender as $land){
            echo "<a href='landinfo.php?code=" . $land["cca2"] . "'>";
            echo "<div class='land'>";
            echo $land["name"]["common"];
            echo "<br>";
            echo "<img src='" . $land["flags"]["png"] . "'>";
            echo "</div>";
            echo  "</a>";
        }

    echo "</div>";


    ?>
    
</body>
</html>