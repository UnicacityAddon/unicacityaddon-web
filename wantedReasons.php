<!doctype html>
<html lang="de">
<head>
    <?php include "common/php/head.php"; ?>
    <title>Wanted Reasons | UCA</title>
</head>
<body>

<video autoplay muted loop id="backgroundVideo">
    <source src="common/img/UnicacityAddonWebsiteBackground.mp4" type="video/mp4">
</video>

<?php include "common/php/nav.php"; ?>

<div class="wantedReasons">
    <p class="text-50-700">Wanted Reasons</p>
    <?php
    $api_url = 'http://rettichlp.de:8888/unicacityaddon/v1/dhgpsklnag2354668ec1d905xcv34d9bdee4b877/wantedreason';
    $json_data = json_decode(file_get_contents($api_url));

    $count = 0;
    foreach ($json_data as $entry) {
        $reason = str_replace("-", " ", $entry->reason);
        $points = $entry->points;
        $color = $count++ % 2 == 1 ? "rgba(0, 0, 0, 0.5)" : "";

        echo "
                <div class='wantedReasons-flexBar' style='background-color: " . $color . "; padding: 0 10px;'>
                    <div class='text-20-300'>" . $reason . "</div>
                    <div class='text-20-300'>" . $points . "</div>
                </div>
            ";
    }
    ?>
</div>

<?php include "common/php/footer.php"; ?>

</body>
</html>