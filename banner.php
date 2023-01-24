<?php
$api_url = 'http://rettichlp.de:8888/unicacityaddon/v1/dhgpsklnag2354668ec1d905xcv34d9bdee4b877/banner';
$json_data = json_decode(file_get_contents($api_url));

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

            // var bannerTimeData = google.visualization.arrayToDataTable([
            //     ['Banner', 'Calderon Kartell', 'Kerzakov Familie', 'La Cosa Nostra', 'Le Milieu', 'O\'brien', 'Westside Ballas'],
            //     ['0', 1000, 1000, 1000, 1000, 1000, 400],
            //     ['1', 1170, 1000, 1000, 1000, 1000, 460],
            //     ['2', 660, 1000, 1000, 1000, 1000, 1120],
            //     ['3', 660, 1000, 1000, 1000, 1000, 1120],
            //     ['4', 660, 1000, 1000, 1000, 1000, 1120],
            //     ['5', 660, 1000, 1000, 1000, 1000, 1120],
            //     ['6', 660, 1000, 1000, 1000, 1000, 1120]
            // ]);

            var optionsBannerFactionData = {
                pieHole: 0.4,
                backgroundColor: 'none',
                legend: 'none',
                chartArea: {top: 10, right: 10, bottom: 10, left: 10},
                pieSliceText: 'label',
                pieSliceBorderColor: 'transparent'
            };

            // var optionsBannerTimeData = {
            //     backgroundColor: 'none',
            //     legend: 'none',
            //     hAxis: {title: 'Stunden', titleTextStyle: {color: '#333'}},
            //     vAxis: {minValue: 0}
            // };

            new google.visualization.PieChart(document.getElementById('banner_faction_chart')).draw(bannerFactionData, optionsBannerFactionData);
            // new google.visualization.AreaChart(document.getElementById('banner_time_chart')).draw(bannerTimeData, optionsBannerTimeData);
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
<!--        <div class="grid-c grid-center">-->
<!--            <div id="banner_time_chart" style="width: 100%; height: 100%"></div>-->
<!--        </div>-->
    </div>
</div>

<?php include "common/php/footer.php"; ?>

</body>
</html>