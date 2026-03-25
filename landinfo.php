<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landinfo</title>
</head>
<body>
    <?php
        $code = $_GET["code"];
        $url = "https://restcountries.com/v3.1/alpha/" . $code;
        $land =  file_get_contents($url);
        $landanzeige = json_decode($land,true);
        echo "Name: " . $landanzeige[0]["name"]["common"];
        echo "<br>";
        echo "Hauptstadt: " . $landanzeige[0]["capital"][0];
        echo "<br>";
        echo "Kontinent: " . $landanzeige[0]["region"];
        echo "<br>";
        echo "Bevölkerung: " . $landanzeige[0]["population"];
        echo "<br>";
        echo "<img src='" . $landanzeige[0]["flags"]["png"] . "'>";
        echo "<br>";
    ?>
    
</body>
</html>