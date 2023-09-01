<!doctype html>
<html lang="de">
<head>
    <?php include "common/php/head.php"; ?>
    <title>Spieler | UCA</title>
</head>
<body>

<video autoplay muted loop id="backgroundVideo">
    <source src="common/img/UnicacityAddonWebsiteBackground.mp4" type="video/mp4">
</video>

<?php include "common/php/nav.php"; ?>

<div class="housebans">
    <p class="text-50-700">Spieler</p>

    <?php
    $searchQuery = !empty($_GET["q"]) ? $_GET["q"] : "3b18599ca4da4dfe82ee0c3621873c54";

    $fileContents = file_get_contents("http://rettichlp.de:8888/unicacityaddon/v1/dhgpsklnag2354668ec1d905xcv34d9bdee4b877/statistic/" . $searchQuery);
    if (!$fileContents) {
        $fileContents = file_get_contents("http://rettichlp.de:8888/unicacityaddon/v1/dhgpsklnag2354668ec1d905xcv34d9bdee4b877/statistic/3b18599ca4da4dfe82ee0c3621873c54");
    }

    $json_data_statistic = json_decode($fileContents);

    $roleplay = $json_data_statistic->roleplay;
    $unicacityaddon = $json_data_statistic->unicacityaddon;
    $faction = $json_data_statistic->faction;
    $name = $json_data_statistic->name;
    $uuid = $json_data_statistic->uuid;
    $gameplay = $json_data_statistic->gameplay;
    ?>

    <div class="player-grid">
        <div class="grid-a grid-white-border">
            <p class="text-40-400" style="text-align: center"><?php echo $json_data_statistic->name ?></p>
            <hr>
            <table style="width: 100%; border: none">
                <tr>
                    <td class="text-20-400">UUID</td>
                    <td class="text-20-400" style="text-align: right"><?php echo $json_data_statistic->uuid ?></td>
                </tr>
                <tr>
                    <td class="text-20-400">Token-Generation</td>
                    <td class="text-20-400" style="text-align: right">
                        <?php
                        $seconds = $unicacityaddon->tokenGenerateTime / 1000;
                        $date = new DateTime("@$seconds");
                        $date->setTimezone(new DateTimeZone('Europe/Berlin'));
                        echo $date->format("d.m.Y H:i:s")
                        ?>
                    </td>
                </tr>
                <tr>
                    <td class="text-20-400">Blacklisted</td>
                    <td class="text-20-400" style="text-align: right"><?php echo $unicacityaddon->blacklisted ? "<span style='background-color: #e43b3b'>BLACKLISTED</span>" : "<span style='background-color: #00ad06'>NEIN</span>" ?></td>
                </tr>
                <tr>
                    <td class="text-20-400">Version</td>
                    <td class="text-20-400" style="text-align: right"><?php echo $unicacityaddon->version ?></td>
                </tr>
            </table>
        </div>
        <div class="grid-b grid-white-border">
            <p class="text-40-400" style="text-align: center">Statistik</p>
            <hr>
            <table style="width: 100%; border: none">
                <tr>
                    <td class="text-20-400">Kills</td>
                    <td class="text-20-400" style="text-align: right"><?php echo $gameplay->kills ?> Morde</td>
                </tr>
                <tr>
                    <td class="text-20-400">Tode</td>
                    <td class="text-20-400" style="text-align: right"><?php echo $gameplay->deaths ?> Tode</td>
                </tr>
                <tr>
                    <td class="text-20-400">KD</td>
                    <td class="text-20-400" style="text-align: right"><?php echo $gameplay->kd ?> K/D</td>
                </tr>
                <tr>
                    <td class="text-20-400">Spielzeit</td>
                    <td class="text-20-400" style="text-align: right"><?php echo $gameplay->playTime ?> Stunden</td>
                </tr>
                <tr>
                    <td class="text-20-400">Services</td>
                    <td class="text-20-400" style="text-align: right"><?php echo $gameplay->services ?> Notrufe</td>
                </tr>
                <tr>
                    <td class="text-20-400">Wiederbelebungen</td>
                    <td class="text-20-400" style="text-align: right"><?php echo $gameplay->revives ?> Spieler</td>
                </tr>
            </table>
        </div>
        <div class="grid-c grid-white-border">
            <p class="text-40-400" style="text-align: center">Gruppen</p>
            <hr>
            <table style="width: 100%; border: none">
                <tr>
                    <td class="text-20-400">CEO</td>
                    <td class="text-20-400" style="text-align: right"><?php echo $unicacityaddon->groups->CEO ? "<span style='background-color: #00ad06'>JA</span>" : "<span style='background-color: #e43b3b'>NEIN</span>" ?></td>
                </tr>
                <tr>
                    <td class="text-20-400">Developer</td>
                    <td class="text-20-400" style="text-align: right"><?php echo $unicacityaddon->groups->DEV ? "<span style='background-color: #00ad06'>JA</span>" : "<span style='background-color: #e43b3b'>NEIN</span>" ?></td>
                </tr>
                <tr>
                    <td class="text-20-400">Moderator</td>
                    <td class="text-20-400" style="text-align: right"><?php echo $unicacityaddon->groups->MOD ? "<span style='background-color: #00ad06'>JA</span>" : "<span style='background-color: #e43b3b'>NEIN</span>" ?></td>
                </tr>
                <tr>
                    <td class="text-20-400">Supporter</td>
                    <td class="text-20-400" style="text-align: right"><?php echo $unicacityaddon->groups->SUP ? "<span style='background-color: #00ad06'>JA</span>" : "<span style='background-color: #e43b3b'>NEIN</span>" ?></td>
                </tr>
                <tr>
                    <td class="text-20-400">Beta-Tester</td>
                    <td class="text-20-400" style="text-align: right"><?php echo $unicacityaddon->groups->BET ? "<span style='background-color: #00ad06'>JA</span>" : "<span style='background-color: #e43b3b'>NEIN</span>" ?></td>
                </tr>
                <tr>
                    <td class="text-20-400">VIP</td>
                    <td class="text-20-400" style="text-align: right"><?php echo $unicacityaddon->groups->VIP ? "<span style='background-color: #00ad06'>JA</span>" : "<span style='background-color: #e43b3b'>NEIN</span>" ?></td>                </tr>
            </table>
        </div>
        <div class="grid-d grid-white-border">
            <p class="text-40-400" style="text-align: center">Roleplay</p>
            <hr>
            <table style="width: 100%; border: none">
                <tr>
                    <td class="text-20-400">Status</td>
                    <td class="text-20-400" style="text-align: right"><?php echo str_contains($roleplay->name, "_") ? "<span style='background-color: #e43b3b'>GEBLOCKT</span>" : "<span style='background-color: #00ad06'>FREIGEGEBEN</span>" ?></td>
                </tr>
                <tr>
                    <td class="text-20-400">Name</td>
                    <td class="text-20-400" style="text-align: right"><?php echo str_replace("_", "", $roleplay->name) ?></td>
                </tr>
            </table>
        </div>
        <div class="grid-e grid-white-border">
            <p class="text-40-400" style="text-align: center">Unicacity</p>
            <hr>
            <p class="text-14-400" style="text-align: center; color: var(--gray)">Diese Fraktion und Rang werden vom UnicacityAddon verwendet um die Berechtigungen des Spielers festzulegen. Die Synchronisierung mit UnicaCity findet alle 10 Minuten statt.</p>
            <table style="width: 100%; border: none">
                <tr>
                    <td class="text-20-400">Fraktion</td>
                    <td class="text-20-400" style="text-align: right"><?php echo $faction->name ?></td>
                </tr>
                <tr>
                    <td class="text-20-400">Rang</td>
                    <td class="text-20-400" style="text-align: right"><?php echo $faction->rank ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>

<?php include "common/php/footer.php"; ?>

</body>
</html>