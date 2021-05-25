<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arsenal Time</title>
    <link rel="stylesheet" href="css/svenskafans.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap">
</head>
<body>
    <div class="box">
    <div class="box-top"><h2 class="box-top-title">Nästa Match</h2></div>
        <div class="box-item">

<?php    

require '../vendor/autoload.php';

$test = new ArsenalTime();
$test->getArsenalTime();


echo $test->getGameDate() . " " . $test->getGameTime() . "<br>";
echo "versus " . $test->getVersusTeam();

?>

        </div>
        <div class="box-bottom">
            Data: <a href="https://www.arsenal.com" target="_blank">Arsenal.com</a>
            , Kod: <a href="https://github.com/thulin82/arsenal_webscrape" target="_blank">GitHub</a>
        </div>
    </div>
</body>
</html>