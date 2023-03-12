<!doctype html>
<html lang="de">
<head>
    <?php include "common/php/head.php"; ?>
    <title>Team | UCA</title>
    <meta http-equiv="refresh" content="10">
</head>
<body style="background-color: var(--darkgray)">

<?php
$json_data = json_decode(file_get_contents('http://rettichlp.de:8888/unicacityaddon/v1/dhgpsklnag2354668ec1d905xcv34d9bdee4b877/event'));

$gangwar = $json_data->gangwar;
$attacker = $gangwar->attacker;
$defender = $gangwar->defender;
?>

<div class="gangwar">

    <div class="gangwar-grid">
        <div class="grid-a grid-center text-40-400">
            Angreifer
        </div>
        <div class="grid-b grid-center">

        </div>
        <div class="grid-c grid-center text-40-400">
            Verteidiger
        </div>
        <div class="grid-d grid-center text-120-700">
            <?php echo $attacker ?>

        </div>
        <div class="grid-e grid-center text-120-700">
            <p>:</p>
        </div>
        <div class="grid-f grid-center text-120-700">
            <?php echo $defender ?>
        </div>
    </div>

</div>

</body>
</html>