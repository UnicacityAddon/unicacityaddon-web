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
    <a class="nav-child nav-child-right text-20-400" href="houseBans.html">House Bans</a>
    <a class="nav-child nav-child-right text-20-400" href="wantedReasons.php">Wanted Reasons</a>
    <a class="nav-child nav-child-right text-20-400" href="Screenshot_20220829-094134_Chrome.jpg">Wiki</a>
    <a class="nav-child nav-child-right text-20-400" href="Screenshot_20220829-094134_Chrome.jpg">What's new?</a>
    <a class="nav-child nav-child-right text-20-400" href="Screenshot_20220829-094134_Chrome.jpg">Code</a>
    <a class="nav-child nav-child-left text-20-800" href="index.html">UnicacityAddon</a>
</nav>

<div class="housebans">
    <div class="housebans-content">
        <p class="text-50-700">House Bans</p>
        <table class="text-25-300">
            <tr>
                <td>Name</td>
                <td>Grund</td>
                <td>vom</td>
                <td>bis</td>
            </tr>

            <?php
            $response = file_get_contents("http://localhost:8888/unicacityaddon/aj4tdsjsof83Inf45zsdtgfB4067dohd/abcdefghijklmnop/houseban?advanced=true");
            $json = json_decode($response);

            foreach ($json as $entry) {
                $name = $entry->name;
                $startTime = $entry->startTime;
                $expirationTime = $entry->expirationTime;

                $reasons = "";
                foreach ($entry->houseBanReasonList as $subEntry) {
                    $reasons = $reasons . str_replace("-", " ", $subEntry->reason) . ", ";
                }

                echo "
                    <tr>
                        <td>" . $name . "</td>
                        <td>" . substr($reasons, 0, -2) . "</td>
                        <td>" . date('d.m.Y', $startTime / 1000) . "</td>
                        <td>" . date('d.m.Y', $expirationTime / 1000) . "</td>
                    </tr>
                ";
            }
            ?>
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