<!doctype html>
<html lang="de">
<head>
    <?php include "common/php/head.php"; ?>
    <title>Team | UCA</title>
</head>
<body>

<video autoplay muted loop id="backgroundVideo">
    <source src="common/img/UnicacityAddonWebsiteBackground.mp4" type="video/mp4">
</video>

<?php include "common/php/nav.php"; ?>

<div class="team">
    <p class="text-50-700">Team</p>

    <?php
    $api_url = 'http://rettichlp.de:8888/unicacityaddon/v1/dhgpsklnag2354668ec1d905xcv34d9bdee4b877/player';
    $json_data = json_decode(file_get_contents($api_url));

    $ceo = $json_data->CEO;
    $dev = $json_data->DEV;
    $moderator = $json_data->MOD;
    $supporter = $json_data->SUP;
    $beta = $json_data->BETA;

    $teams = array(
            0 => array(
                    "name" => "CEO & Developer",
                    "team" => $ceo,
                    "class" => "ceo"
            ),
            1 => array(
                    "name" => "Developer",
                    "team" => $dev,
                    "class" => "dev"
            ),
            2 => array(
                    "name" => "Moderatoren",
                    "team" => $moderator,
                    "class" => "mod"
            ),
            3 => array(
                    "name" => "Supporter",
                    "team" => $supporter,
                    "class" => "sup"
            ),
            4 => array(
                    "name" => "Beta-Tester",
                    "team" => $beta,
                    "class" => "bet"
            )
    );

    foreach ($teams as $teamEntry) {
        $teamName = $teamEntry["name"];
        $teamMember = $teamEntry["team"];
        $teamClass = $teamEntry["class"];

        if ($teamName === "Developer") continue;

        echo "<p class='text-40-400' style='text-align: center'>" . $teamName . "</p>";
        echo "<div class='team-group'>";

        foreach ($teamMember as $teamMemberEntry) {
            $name = $teamMemberEntry->name;
            $uuid = $teamMemberEntry->uuid;

            echo "
                <div class='team-group-entry " . $teamClass ."'>
                    <img src='https://crafatar.com/avatars/" . $uuid . "?size=130&overlay' alt='Skin of " . $name . "'><br>
                    <p class='text-25-300'>" . $name . "</p>
                </div>
            ";
        }

        echo "</div>";
    }
    ?>
</div>

<?php include "common/php/footer.php"; ?>

</body>
</html>