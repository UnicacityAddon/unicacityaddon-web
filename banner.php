<?php
$json_data = json_decode(file_get_contents('http://rettichlp.de:8888/unicacityaddon/v1/dhgpsklnag2354668ec1d905xcv34d9bdee4b877/banner'));

$faction = $json_data->faction;

$bannerFactionArray = array(
    0 => array(
        "name" => "Calderon Kartell",
        "bannerCount" => $faction->{"Calderon Kartell"}
    ),
    1 => array(
        "name" => "Kerzakov Familie",
        "bannerCount" => $faction->{"Kerzakov Familie"}
    ),
    2 => array(
        "name" => "La Cosa Nostra",
        "bannerCount" => $faction->{"La Cosa Nostra"}
    ),
    3 => array(
        "name" => "Le Milieu",
        "bannerCount" => $faction->{"Le Milieu"}
    ),
    4 => array(
        "name" => "O'brien",
        "bannerCount" => $faction->{"O'brien"}
    ),
    5 => array(
        "name" => "Westside Ballas",
        "bannerCount" => $faction->{"Westside Ballas"}
    )
);

$sprayable = 0;
$notSprayable = 0;

$sprayedBanners = $json_data->sprayedBanners;
foreach ($sprayedBanners as $banner) {
    if ($banner->sprayable) {
        $sprayable++;
    } else {
        $notSprayable++;
    }
}
?>

<!doctype html>
<html lang="de">
<head>
    <?php include "common/php/head.php"; ?>
    <title>Banner | UCA</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load("current", {packages: ["corechart"]});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var bannerFactionData = google.visualization.arrayToDataTable([
                ['Fraktion', 'Anzahl'],
                [<?php echo "\"" . $bannerFactionArray[0]["name"] . "\", " . $bannerFactionArray[0]["bannerCount"] ?>],
                [<?php echo "\"" . $bannerFactionArray[1]["name"] . "\", " . $bannerFactionArray[1]["bannerCount"] ?>],
                [<?php echo "\"" . $bannerFactionArray[2]["name"] . "\", " . $bannerFactionArray[2]["bannerCount"] ?>],
                [<?php echo "\"" . $bannerFactionArray[3]["name"] . "\", " . $bannerFactionArray[3]["bannerCount"] ?>],
                [<?php echo "\"" . $bannerFactionArray[4]["name"] . "\", " . $bannerFactionArray[4]["bannerCount"] ?>],
                [<?php echo "\"" . $bannerFactionArray[5]["name"] . "\", " . $bannerFactionArray[5]["bannerCount"] ?>]
            ]);

            var bannerSprayableData = google.visualization.arrayToDataTable([
                ['Status', 'Anzahl'],
                ['übersprühbar', <?php echo $sprayable ?>],
                ['nicht übersprühbar', <?php echo $notSprayable ?>]
            ]);

            var options = {
                pieHole: 0.4,
                backgroundColor: 'none',
                legend: 'none',
                chartArea: {top: 10, right: 10, bottom: 10, left: 10},
                pieSliceText: 'label',
                pieSliceBorderColor: 'transparent'
            };

            new google.visualization.PieChart(document.getElementById('banner_faction_chart')).draw(bannerFactionData, options);
            new google.visualization.PieChart(document.getElementById('banner_sprayable_chart')).draw(bannerSprayableData, options);
        }
    </script>
</head>
<body>

<video autoplay muted loop id="backgroundVideo">
    <source src="common/img/UnicacityAddonWebsiteBackground.mp4" type="video/mp4">
</video>

<?php include "common/php/nav.php"; ?>

<div class="banner">
    <p class="text-50-700">Banner</p>

    <div class="banner-grid">
        <div class="grid-a grid-center">
            <div id="banner_faction_chart" style="width: 300px; height: 300px"></div>
        </div>
        <div class="grid-b">
            <table style="width: 30%; border: none">
                <?php
                foreach ($bannerFactionArray as $bannerEntry) {
                    $factionName = $bannerEntry["name"];
                    $bannerCount = $bannerEntry["bannerCount"];

                    echo "
                        <tr>
                            <td><p class='text-20-400'>" . $factionName . "</p></td>
                            <td><p class='text-20-400' style='text-align: right'>" . $bannerCount . "</p></td>
                        </tr>";
                }
                ?>
            </table>
        </div>
    </div>
    <div class="banner-grid">
        <div class="grid-a grid-center">
            <div id="banner_sprayable_chart" style="width: 300px; height: 300px"></div>
        </div>
        <div class="grid-b">
            <table style="width: 30%; border: none">
                <tr>
                    <td><p class='text-20-400'>Übersprühbar</p></td>
                    <td><p class='text-20-400' style='text-align: right'><?php echo $sprayable ?></p></td>
                </tr>
                <tr>
                    <td><p class='text-20-400'>Nicht übersprühbar</p></td>
                    <td><p class='text-20-400' style='text-align: right'><?php echo $notSprayable ?></p></td>
                </tr>
            </table>
        </div>
    </div>
</div>

<?php include "common/php/footer.php"; ?>

</body>
</html>