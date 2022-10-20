<!doctype html>
<html lang="de">
<head>
    <?php include "common/php/head.php"; ?>
    <title>House Bans | UCA</title>
</head>
<body>

<video autoplay muted loop id="backgroundVideo">
    <source src="common/img/UnicacityAddonWebsiteBackground.mp4" type="video/mp4">
</video>

<?php include "common/php/nav.php"; ?>

<div class="housebans">
    <p class="text-50-700">House Bans</p>
    <?php
    $api_url = 'http://rettichlp.de:8888/unicacityaddon/v1/dhgpsklnag2354668ec1d905xcv34d9bdee4b877/houseban?advanced=false';
    $json_data = json_decode(file_get_contents($api_url));

    $count = 0;
    foreach ($json_data as $entry) {
        $name = $entry->name;
        $startTime = $entry->startTime;
        $expirationTime = $entry->expirationTime;

        $reasons = "<ul>";
        foreach ($entry->houseBanReasonList as $subEntry) {
            $reasons = $reasons . "<li>" . str_replace("-", " ", $subEntry->reason) . "</li>";
        }
        $reasons = $reasons . "</ul>";
        $color = $count++ % 2 == 1 ? "rgba(0, 0, 0, 0.5)" : "";

        echo "
                <div class='housebans-flexBar' style='background-color: " . $color . "; padding: 0 10px;'>
                    <div class='text-20-300 housebans-flexBar-name'>" . $name . "</div>
                    <div class='text-20-300 housebans-flexBar-reason'>" . $reasons . "</div>
                    <div class='text-20-300 housebans-flexBar-date'>" . date('d.m.Y', $startTime / 1000) . " - " . date('d.m.Y', $expirationTime / 1000) . "</div>
                </div>
            ";
    }
    ?>
</div>

<?php include "common/php/footer.php"; ?>

</body>
</html>