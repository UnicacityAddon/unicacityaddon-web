<?php
$api_url = 'http://rettichlp.de:8888/unicacityaddon/v1/dhgpsklnag2354668ec1d905xcv34d9bdee4b877/mgmt';
$json_data = json_decode(file_get_contents($api_url));

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
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=chrome">
    <link rel="shortcut icon" href="common/img/UCLogo.png" type="image/x-icon">
    <link rel="stylesheet" href="common/css/master.css">
    <link rel="stylesheet" href="common/css/font.css">
    <script src="common/js/master.js"></script>
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

            new google.visualization.PieChart(document.getElementById('donutchart')).draw(activePlayersData, options);
            new google.visualization.PieChart(document.getElementById('donutchart2')).draw(activePlayersData2, options);
        }
    </script>
    <title>UnicacityWeb</title>
</head>
<body>

<video autoplay muted loop id="backgroundVideo">
    <source src="common/img/UnicacityAddonWebsiteBackground.mp4" type="video/mp4">
</video>

<nav id="nav" class="nav">
    <a class="nav-child nav-child-right text-20-400" href="https://github.com/rettichlp/UnicacityAddon-1.12.2/releases/download/v<?php echo $latestVersion ?>/UnicacityAddon-<?php echo $latestVersion ?>.jar">Download</a>
    <span class="nav-child text-20-400" style="float: right"> | </span>
    <a class="nav-child nav-child-right text-20-400" href="">House Bans</a>
    <a class="nav-child nav-child-right text-20-400" href="">Wanted Reasons</a>
    <a class="nav-child nav-child-right text-20-400" href="https://github.com/rettichlp/UnicacityAddon-1.12.2/wiki">Wiki</a>
    <a class="nav-child nav-child-right text-20-400" href="https://github.com/rettichlp/UnicacityAddon-1.12.2/releases/latest">What's new?</a>
    <a class="nav-child nav-child-right text-20-400" href="https://github.com/rettichlp/UnicacityAddon-1.12.2/tree/main">Code</a>
    <a class="nav-child nav-child-left text-20-800" href="index.php">UnicacityAddon</a>
</nav>

<div class="index-first">
    <div class="index-first-content">
        <p class="text-80-700">UnicacityAddon <span class="text-40-400">v<span
                        style="color: var(--blue)"><?php echo $latestVersion ?></span></span></p>
        <p class="text-25-300">
            by RettichLP and Dimiikou<br><br>
            This addon is a modification for <a class="link" href="http://unicacity.de/" target="_blank">UnicaCity</a>
            providing specialized<br>
            and nice-to-have features and utilities for everyday gameplay.
        </p>
        <p class="text-50-700" style="color: var(--blue);">#improveYourGame</p>
        <a href="https://github.com/rettichlp/UnicacityAddon-1.12.2/releases/download/v<?php echo $latestVersion ?>/UnicacityAddon-<?php echo $latestVersion ?>.jar">
            <button class="button-download">Download</button>
        </a>
    </div>
</div>

<div class="index-second">
    <div class="index-second-grid">
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
            <div id="donutchart" style="width: 300px; height: 300px"></div>
        </div>
        <div class="grid-f grid-center">
            <div id="donutchart2" style="width: 300px; height: 300px"></div>
        </div>
    </div>
</div>

<div class="index-third">
    <div class="index-third-grid">
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

<div class="footer">
    <div class="footer-grid">
        <div class="grid-a">
            <img src="common/img/UCLogo.png" height="100px" alt="Unicacity Logo">
        </div>
        <div class="grid-b grid-right">
            <p class="text-20-800">Support</p>
            <a class="text-14-400" style="text-decoration: none; color: white;" href="https://discord.gg/A9u5eY7CbS">UnicacityAddon Discord</a><br>
            <a class="text-14-400" style="text-decoration: none; color: white;" href="https://github.com/rettichlp/UnicacityAddon-1.12.2/issues/new?assignees=&labels=bug&template=bug-oder-fehler.md&title=UCAB+-+F%C3%BCge+hier+eine+kurze+Beschreibung+ein">You found a bug?</a><br>
            <a class="text-14-400" style="text-decoration: none; color: white;" href="https://github.com/rettichlp/UnicacityAddon-1.12.2/issues/new?assignees=&labels=enhancement&template=feature.md&title=UCAF+-+F%C3%BCge+hier+eine+kurze+Beschreibung+ein">You have an idea for a new feature?</a><br>
            <a class="text-14-400" style="text-decoration: none; color: white;" href="https://unicacity.de/teamspeak">UnicaCity TeamSpeak</a><br>
        </div>
        <div class="grid-c grid-right">
            <p class="text-20-800">Gameplay</p>
            <a class="text-14-400" style="text-decoration: none; color: white;" href="">Wanted Reasons</a><br>
            <a class="text-14-400" style="text-decoration: none; color: white;" href="">House Bans</a><br>
        </div>
        <div class="grid-d grid-right">
            <p class="text-20-800">Development</p>
            <a class="text-14-400" style="text-decoration: none; color: white;" href="https://github.com/rettichlp/UnicacityAddon-1.12.2/tree/main">Code @ GitHub</a><br>
            <a class="text-14-400" style="text-decoration: none; color: white;" href="https://github.com/rettichlp/UnicacityAddon-1.12.2/wiki">Wiki @ GitHub</a><br>
            <a class="text-14-400" style="text-decoration: none; color: white;" href="https://github.com/rettichlp/UnicacityAddon-1.12.2/releases">Versions @ GitHub</a><br>
            <a class="text-14-400" style="text-decoration: none; color: white;" href="https://docs.labymod.net/pages/create-addons/introduction/">LabyMod Documentation</a><br>
            <a class="text-14-400" style="text-decoration: none; color: white;" href="https://docs.minecraftforge.net/en/latest/">Forge Documentation</a><br>
        </div>
        <div class="grid-e grid-right">
            <p class="text-20-800">Download</p>
            <a class="text-14-400" style="text-decoration: none; color: white;" href="https://github.com/rettichlp/UnicacityAddon-1.12.2/releases/download/v<?php echo $latestVersion ?>/UnicacityAddon-<?php echo $latestVersion ?>.jar">UnicacityAddon</a><br>
            <a class="text-14-400" style="text-decoration: none; color: white;" href="https://www.labymod.net/de/download">Labymod</a><br>
            <a class="text-14-400" style="text-decoration: none; color: white;" href="https://files.minecraftforge.net/net/minecraftforge/forge/index_1.12.2.html">Forge 1.12.2</a><br>
        </div>
        <div class="grid-f grid-right">
            <p  class="text-14-400" style="color: var(--gray)">UnicacityAddon<br>© <?php echo date("Y"); ?> RettichLP and Dimiikou</p>
        </div>
    </div>
</div>

</body>
</html>