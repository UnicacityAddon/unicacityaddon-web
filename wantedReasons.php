<!doctype html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=chrome">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="common/css/master.css">
    <link rel="stylesheet" href="common/css/font.css">
    <script src="common/js/master.js"></script>
    <title>UnicacityWeb</title>
</head>
<body>

<nav id="nav" class="nav">
    <a class="nav-child nav-child-right text-20-400" href="Screenshot_20220829-094134_Chrome.jpg">Download</a>
    <span class="nav-child text-20-400" style="float: right"> | </span>
    <a class="nav-child nav-child-right text-20-400" href="houseBans.php">House Bans</a>
    <a class="nav-child nav-child-right text-20-400" href="wantedReasons.html">Wanted Reasons</a>
    <a class="nav-child nav-child-right text-20-400" href="Screenshot_20220829-094134_Chrome.jpg">Wiki</a>
    <a class="nav-child nav-child-right text-20-400" href="Screenshot_20220829-094134_Chrome.jpg">What's new?</a>
    <a class="nav-child nav-child-right text-20-400" href="Screenshot_20220829-094134_Chrome.jpg">Code</a>
    <a class="nav-child nav-child-left text-20-800" href="index.html">UnicacityAddon</a>
</nav>

<div class="housebans">
    <div class="housebans-content">
        <p class="text-50-700">Wanted Reasons</p>
        <table class="text-25-300">
            <tr>
                <td>Grund</td>
                <td>Wanted Points</td>
            </tr>

            <?php
            $response = file_get_contents("http://localhost:8888/unicacityaddon/aj4tdsjsof83Inf45zsdtgfB4067dohd/abcdefghijklmnop/wantedreason");
            $json = json_decode($response);

            foreach ($json as $entry) {
                $reason = str_replace("-", " ", $entry->reason);
                $points = $entry->points;

                echo "
                    <tr>
                        <td>" . $reason . "</td>
                        <td>" . $points . "</td>
                    </tr>
                ";
            }
            ?>
            <tr>
                <td>Massenmord + Waffenscheinabnahme</td>
                <td>69</td>
            </tr>
            <tr>
                <td>Massenmord</td>
                <td>69</td>
            </tr>
            <tr>
                <td>Terrorismus</td>
                <td>65</td>
            </tr>
            <tr>
                <td>Doppelmord</td>
                <td>65</td>
            </tr>
            <tr>
                <td>Geiselnahme</td>
                <td>65</td>
            </tr>
            <tr>
                <td>Mord</td>
                <td>60</td>
            </tr>
            <tr>
                <td>Versuchter Mord</td>
                <td>55</td>
            </tr>
            <tr>
                <td>Grob fahrlässiges Überfahren eines anderen Verkehrsteilnehmers mit anschließender Fahrerflucht + Führerscheinabnahme</td>
                <td>55</td>
            </tr>
            <tr>
                <td>Grob fahrlässiges Überfahren eines anderen Verkehrsteilnehmers</td>
                <td>55</td>
            </tr>
            <tr>
                <td>Totschlag</td>
                <td>50</td>
            </tr>
            <tr>
                <td>Grob fahrlässige Tötung</td>
                <td>50</td>
            </tr>
            <tr>
                <td>Gebietsbesetzung</td>
                <td>50</td>
            </tr>
            <tr>
                <td>Unterlassene Hilfeleistung mit anschließender Todesfolge</td>
                <td>50</td>
            </tr>
            <tr>
                <td>Einbruch in geschlossene Räume einer staatlichen Einrichtung</td>
                <td>50</td>
            </tr>
            <tr>
                <td>Vergewaltigung</td>
                <td>45</td>
            </tr>
            <tr>
                <td>Menschenhandel</td>
                <td>45</td>
            </tr>
            <tr>
                <td>Besitz von Betäubungsmitteln (51+ Gramm)</td>
                <td>45</td>
            </tr>
            <tr>
                <td>Schwerer Diebstahl</td>
                <td>45</td>
            </tr>
            <tr>
                <td>Sperrgebiet</td>
                <td>45</td>
            </tr>
            <tr>
                <td>Waffentransport</td>
                <td>40</td>
            </tr>
            <tr>
                <td>Vermummen in der Öffentlichkeit</td>
                <td>40</td>
            </tr>
            <tr>
                <td>Schwerer Hausfriedensbruch</td>
                <td>40</td>
            </tr>
            <tr>
                <td>Schutz eines hochgradig Gesuchten</td>
                <td>40</td>
            </tr>
            <tr>
                <td>Räuberische Erpressung</td>
                <td>40</td>
            </tr>
            <tr>
                <td>Maskieren in der Öffentlichkeit</td>
                <td>40</td>
            </tr>
            <tr>
                <td>Leichenbewachung</td>
                <td>40</td>
            </tr>
            <tr>
                <td>Herstellen von Betäubungsmitteln</td>
                <td>40</td>
            </tr>
            <tr>
                <td>Freiheitsberaubung</td>
                <td>40</td>
            </tr>
            <tr>
                <td>Besitz von Betäubungsmitteln (41 bis 50 Gramm)</td>
                <td>40</td>
            </tr>
            <tr>
                <td>Amtsanmaßung</td>
                <td>40</td>
            </tr>
            <tr>
                <td>Anstiftung zum Mord</td>
                <td>40</td>
            </tr>
            <tr>
                <td>Tragen eines Tarnanzuges</td>
                <td>40</td>
            </tr>
            <tr>
                <td>Waffen im Medic Dienst</td>
                <td>35</td>
            </tr>
            <tr>
                <td>Volksverhetzung</td>
                <td>35</td>
            </tr>
            <tr>
                <td>Sexuelle Belästigung</td>
                <td>35</td>
            </tr>
            <tr>
                <td>Tierquälerei</td>
                <td>35</td>
            </tr>
            <tr>
                <td>Schwere Körperverletzung</td>
                <td>35</td>
            </tr>
            <tr>
                <td>Stalking</td>
                <td>35</td>
            </tr>
            <tr>
                <td>Raub</td>
                <td>35</td>
            </tr>
            <tr>
                <td>Nachstellung</td>
                <td>35</td>
            </tr>
            <tr>
                <td>Morddrohung</td>
                <td>35</td>
            </tr>
            <tr>
                <td>Mitgliedschaft einer kriminellen Gruppierung</td>
                <td>35</td>
            </tr>
            <tr>
                <td>Bilden bewaffneter Gruppen</td>
                <td>35</td>
            </tr>
            <tr>
                <td>Besitz von Betäubungsmitteln (31 bis 40 Gramm)</td>
                <td>35</td>
            </tr>
            <tr>
                <td>Nötigung von Vollstreckungsbeamten</td>
                <td>35</td>
            </tr>
            <tr>
                <td>Schwere Sachbeschädigung</td>
                <td>35</td>
            </tr>
            <tr>
                <td>Entziehung der staatlichen Gewalt</td>
                <td>35</td>
            </tr>
            <tr>
                <td>Weiterverkauf von Rezepten oder rezeptpflichtigen Medikamenten</td>
                <td>35</td>
            </tr>
            <tr>
                <td>Waffenbesitz ohne Waffenschein</td>
                <td>30</td>
            </tr>
            <tr>
                <td>Rufmord</td>
                <td>30</td>
            </tr>
            <tr>
                <td>Illegale Werbung</td>
                <td>30</td>
            </tr>
            <tr>
                <td>Hausfriedensbruch</td>
                <td>30</td>
            </tr>
            <tr>
                <td>Handeln mit Betäubungsmitteln</td>
                <td>30</td>
            </tr>
            <tr>
                <td>Erpressung</td>
                <td>30</td>
            </tr>
            <tr>
                <td>Diebstahl</td>
                <td>30</td>
            </tr>
            <tr>
                <td>Besitz von Betäubungsmitteln (21 bis 30 Gramm)</td>
                <td>30</td>
            </tr>
            <tr>
                <td>Schutzhaft</td>
                <td>30</td>
            </tr>
            <tr>
                <td>Unterlassene Hilfeleistung</td>
                <td>25</td>
            </tr>
            <tr>
                <td>Sachbeschädigung</td>
                <td>25</td>
            </tr>
            <tr>
                <td>Leichte Körperverletzung</td>
                <td>25</td>
            </tr>
            <tr>
                <td>Entsagen von Anordnungen</td>
                <td>25</td>
            </tr>
            <tr>
                <td>Drohung</td>
                <td>25</td>
            </tr>
            <tr>
                <td>Betrug</td>
                <td>25</td>
            </tr>
            <tr>
                <td>Besitz von Betäubungsmitteln (11 bis 20 Gramm)</td>
                <td>25</td>
            </tr>
            <tr>
                <td>Belästigung</td>
                <td>25</td>
            </tr>
            <tr>
                <td>Anstößiges Verhalten in der Öffentlichkeit</td>
                <td>25</td>
            </tr>
            <tr>
                <td>Anstößiges Kleiden in der Öffentlichkeit</td>
                <td>25</td>
            </tr>
            <tr>
                <td>Vandalismus</td>
                <td>25</td>
            </tr>
            <tr>
                <td>Nötigung</td>
                <td>25</td>
            </tr>
            <tr>
                <td>Vortäuschen falscher Tatsachen</td>
                <td>25</td>
            </tr>
            <tr>
                <td>Todeswunsch</td>
                <td>25</td>
            </tr>
            <tr>
                <td>Erregung öffentlichen Ärgernisses</td>
                <td>25</td>
            </tr>
            <tr>
                <td>Unfähigkeit zum Ausweisen der Identität oder Lizenzen</td>
                <td>25</td>
            </tr>
            <tr>
                <td>Beihilfe zur Entziehung staatlicher Gewalt</td>
                <td>25</td>
            </tr>
            <tr>
                <td>Störung der Religionsausübung</td>
                <td>20</td>
            </tr>
            <tr>
                <td>Provozieren eines Vollstreckungsbeamten</td>
                <td>20</td>
            </tr>
            <tr>
                <td>Missbrauch von Notrufen</td>
                <td>20</td>
            </tr>
            <tr>
                <td>Beteiligung an einer Schlägerei</td>
                <td>20</td>
            </tr>
            <tr>
                <td>Besitz von Betäubungsmitteln (1 bis 10 Gramm)</td>
                <td>20</td>
            </tr>
            <tr>
                <td>Behinderung staatlicher Institutionen</td>
                <td>20</td>
            </tr>
            <tr>
                <td>Behinderung des Verkehrs</td>
                <td>20</td>
            </tr>
            <tr>
                <td>Gaffen</td>
                <td>20</td>
            </tr>
            <tr>
                <td>Lärmbelästigung</td>
                <td>20</td>
            </tr>
            <tr>
                <td>Zahlungsunfähigkeit bei einem Bußgeldbescheid</td>
                <td>20</td>
            </tr>
            <tr>
                <td>Beleidigung</td>
                <td>20</td>
            </tr>
            <tr>
                <td>Konsum von Betäubungsmitteln</td>
                <td>20</td>
            </tr>
            <tr>
                <td>Weiterverkauf geschützter Literatur</td>
                <td>15</td>
            </tr>
            <tr>
                <td>Umweltverschmutzung</td>
                <td>15</td>
            </tr>
            <tr>
                <td>Unterschlagung</td>
                <td>15</td>
            </tr>
            <tr>
                <td>Angeln ohne Angelschein</td>
                <td>10</td>
            </tr>
            <tr>
                <td>Untersuchungshaft</td>
                <td>1</td>
            </tr>
            <tr>
                <td>Nachzahlen eines Bußgeldbescheides (150$)</td>
                <td>1</td>
            </tr>
            <tr>
                <td>Nachzahlen eines Bußgeldbescheides (250$)</td>
                <td>1</td>
            </tr>
            <tr>
                <td>Nachzahlen eines Bußgeldbescheides (200$)</td>
                <td>1</td>
            </tr>
            <tr>
                <td>Nachzahlen eines Bußgeldbescheides (350$)</td>
                <td>1</td>
            </tr>
        </table>
    </div>
</div>

<footer>
    <table>
        <tr class="text-14-400">
            <td>
                <img src="Screenshot_20220829-094134_Chrome.jpg" alt="" srcset="">
            </td>
            <td>
                <p class="text-20-800">Support</p>
                <a href="">UnicacityAddon Discord</a><br>
                <a href="">You found a bug?</a><br>
                <a href="">You have an idea for a new feature?</a><br>
                <a href="">UnicaCity TeamSpeak</a><br>
            </td>
            <td>
                <p class="text-20-800">Gameplay</p>
                <a href="">Wanted Reasons</a><br>
                <a href="">House Bans</a><br>
            </td>
            <td>
                <p class="text-20-800">Development</p>
                <a href="">Code @ GitHub</a><br>
                <a href="">Wiki @ GitHub</a><br>
                <a href="">Versions @ GitHub</a><br>
                <a href="">LabyMod Documentation</a><br>
                <a href="">Forge Documentation</a><br>
            </td>
        </tr>
    </table>
    <span class="text-14-400" style="color: var(--gray)">UnicacityAddon<br>© 2022 RettichLP and Dimiikou</span>
</footer>
</body>
</html>