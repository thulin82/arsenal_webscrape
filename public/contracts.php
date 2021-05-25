<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arsenal Contract Lenght</title>
    <link rel="stylesheet" href="css/svenskafans.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap">
</head>
<body>
    <div class="box">
    <div class="box-top"><h2 class="box-top-title">Arsenals Spelarkontrakt</h2></div>
        <div class="box-item">

<?php

require '../vendor/autoload.php';

$test = new ArsenalContracts();
$test->getArsenalContracts();
$players = $test->getPlayerName();
$contracts = $test->getContractEnds();

foreach ($players as $key => $value) {
    echo $value . " - " . $contracts[$key] . " " . "<br>";
}
?>

        </div>
        <div class="box-bottom">
            Data: <a href="https://www.transfermarkt.co.uk/jumplist/kader/verein/11" target="_blank">Transfermarkt</a>
            , Kod: <a href="https://github.com/thulin82/arsenal_webscrape" target="_blank">GitHub</a>
        </div>
    </div>
</body>
</html>