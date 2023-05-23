<?php
$json_data = json_decode(file_get_contents('http://rettichlp.de:8888/unicacityaddon/v1/dhgpsklnag2354668ec1d905xcv34d9bdee4b877/mgmt'));

$activeClients = $json_data->activeClients;
$totalClients = $json_data->totalClients;
$requests = $json_data->requests;
$formattedRequests = number_format($requests, 0, ",", ".");
$latestVersion = $json_data->latestVersion;
$versions = $json_data->versions;
?>

<!doctype html>
<html lang="de">
<head>
    <?php include "common/php/head.php"; ?>
    <title>UnicacityAddon | UCA</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load("current", {packages: ["corechart"]});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var activePlayersData = google.visualization.arrayToDataTable([
                ['Status', 'Anzahl'],
                ['Aktive Spieler', <?php echo $activeClients ?>],
                ['Inaktive Spieler', <?php echo $totalClients - $activeClients ?>]
            ]);

            var activePlayersData2 = google.visualization.arrayToDataTable([
                ['Version', 'Anzahl der Spieler'],
                <?php
                foreach ($versions as $version) {
                    echo "['" . $version->version . "', " . $version->users . "],";
                }
                ?>
                ['', 0]
            ]);

            var options = {
                pieHole: 0.4,
                backgroundColor: 'none',
                legend: 'none',
                chartArea: {top: 10, right: 10, bottom: 10, left: 10},
                pieSliceBorderColor: 'transparent'
            };

            new google.visualization.PieChart(document.getElementById('player_activity_chart')).draw(activePlayersData, options);
            new google.visualization.PieChart(document.getElementById('version_overview_chart')).draw(activePlayersData2, options);
        }
    </script>
</head>
<body>

<video autoplay muted loop id="backgroundVideo">
    <source src="common/img/UnicacityAddonWebsiteBackground.mp4" type="video/mp4">
</video>

<?php include "common/php/nav.php"; ?>

<div class="index-main">
    <div class="index-main-content">
        <p class="text-80-700">UnicacityAddon <span class="text-40-400">v<span
                        style="color: var(--blue)"><?php echo $latestVersion ?></span></span></p>
        <p class="text-25-300">
            by RettichLP and Dimiikou<br><br>
            This addon is a modification for <a class="link" href="http://unicacity.de/" target="_blank">UnicaCity</a>
            providing specialized<br>
            and nice-to-have features and utilities for everyday gameplay.
        </p>
        <p class="text-50-700" style="color: var(--blue);">#improveYourGame</p>
        <a href="https://github.com/UnicacityAddon/unicacityaddon-addon/releases/download/v<?php echo $latestVersion ?>/UnicacityAddon-<?php echo $latestVersion ?>.jar">
            <button class="button-download">Download</button>
        </a>
    </div>
</div>

<a href="#index-statistic">
    <div class="arrow">
        <svg>
            <polygon points="37.6,27.9 1.8,1.3 3.3,0 37.6,25.3 71.9,0 73.7,1.3 "/>
            <polygon points="37.6,45.8 0.8,18.7 4.4,16.4 37.6,41.2 71.2,16.4 74.5,18.7 "/>
            <polygon points="37.6,64 0,36.1 5.1,32.8 37.6,56.8 70.4,32.8 75.5,36.1 "/>
        </svg>
    </div>
</a>

<div id="index-statistic" class="index-statistic">
    <div class="index-statistic-grid">
        <div class="grid-a grid-center">
            <h2>Statistiken</h2>
        </div>
        <div class="grid-b grid-center">
            <h2>Spieleraktivität</h2>
        </div>
        <div class="grid-c grid-center">
            <h2>Versionsverteilung</h2>
        </div>

        <div class="grid-d">
            <table style="border: none; width: 100%">
                <tr>
                    <td class="text-20-400">Aktueller Main-Release:</td>
                    <td class="text-20-800" style="color: var(--blue); float: right;">v<?php echo $latestVersion ?></td>
                </tr>
            </table>
            <br><br>
            <table style="border: none; width: 100%">
                <tr>
                    <td class="text-20-400">Spieleranzahl (gesamt):</td>
                    <td class="text-20-800" style="color: var(--blue); float: right;"><?php echo $totalClients ?> Spieler</td>
                </tr>
                <tr>
                    <td class="text-20-400">Spieleranzahl (letzten 3 Tage):</td>
                    <td class="text-20-800" style="color: var(--blue); float: right;"><?php echo $activeClients ?> Spieler</td>
                </tr>
                <tr>
                    <td class="text-20-400">Spieleranzahl (inaktiv):</td>
                    <td class="text-20-800" style="color: var(--blue); float: right;"><?php echo $totalClients - $activeClients ?> Spieler</td>
                </tr>
            </table>
            <br><br>
            <table style="border: none; width: 100%">
                <tr>
                    <td class="text-20-400">API Anfragen (gesamt):</td>
                    <td class="text-20-800" style="color: var(--blue); float: right;"><?php echo $formattedRequests ?> Requests</td>
                </tr>
            </table>
        </div>
        <div class="grid-e grid-center">
            <div id="player_activity_chart" style="width: 300px; height: 300px"></div>
        </div>
        <div class="grid-f grid-center">
            <div id="version_overview_chart" style="width: 300px; height: 300px"></div>
        </div>
    </div>
</div>

<div class="index-history">
    <div class="index-history-grid">
        <div class="grid-a">
            <img src="common/img/RettichByEmii.png" alt="RettichLP">
        </div>
        <div class="grid-b">
            <p class="text-40-400">Entstehungsgeschichte</p>
            <p class="text-20-300">
                Für Unicacity wurde ein Update auf eine neuere Minecraft Version angekündigt. Zu diesem Zeitpunkt gab es eine Modifikation, die von vielen Spielern genutzt wurde. Diese vereinfachte das Spielerlebnis.<br>
                Ab dem Moment kam Dimiikou und RettichLP die Idee, für die neue Version einen Mod zur Verfügung zu stellen. Das hatte nur einen Haken. Geplant war ein Update auf die 1.16.5 und viele Spieler nutzen Labymod auf Unicacity. Jedoch unterstützt Labymod mit der 1.16.5 kein Forge. Somit kam nur ein Labymod-Addon in Frage.<br>
                Das Addon war relativ schnell erstellt und wurde auch von Labymod verifiziert und ist seit dem in der Addon-Liste von Labymod.<br>
                Irgendwann ist der Server, von dem UCUtils seine Daten bekam, nicht mehr erreichbar gewesen. Die Folge war, dass manche Spieler keine Befehle mehr nutzen konnten und Fraktionsdaten nicht geladen wurden.
            </p>
        </div>
        <div class="grid-c">
            <p class="text-20-300">
                Es wurde eine Alternative benötigt und wir sahen unsere Chance!<br>
                Wir entschieden uns, das Addon, das bereits für die 1.16.5 funktionierte, auf die 1.12.2 umzuschreiben und zur Verfügung zu stellen.<br>
                Nach und nach kamen immer mehr Funktionen dazu, die von unserem Addon und UCUtils übernommen wurden. Ab der Addon-Version 1.5.0 haben wir sogar einen Server und stellen Daten über eine API zur Verfügung.<br>
                Mittlerweile ist unser Addon von fast jeder Fraktion anerkannt und wird von über 200 Spielern genutzt.<br><br>
                Danke für Eure Unterstützung! :D
            </p>
        </div>
    </div>
</div>

<?php include "common/php/footer.php"; ?>

</body>
</html>