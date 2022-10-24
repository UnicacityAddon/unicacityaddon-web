<?php 
session_start();
error_reporting(E_ALL);
?>

<!doctype html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=chrome">
    <link rel="shortcut icon" href="../common/img/UCLogo.png" type="image/x-icon">
    <link rel="stylesheet" href="./common/css/materialize.css">
    <link rel="stylesheet" href="../common/css/font.css">
    <script src="../common/js/master.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <title>Faction Manager | UCA</title>
</head>
<body>

<video autoplay muted loop id="backgroundVideo">
    <source src="../common/img/UnicacityAddonWebsiteBackground.mp4" type="video/mp4">
</video>

<nav id="nav" class="nav">
    <?php 
    if (!isset($_SESSION['logged'])) { ?>
       <a class="nav-child nav-child-right text-20-400" href="./login">Login</a>
    <?php } else {

    } ?>
    <span class="nav-child text-20-400" style="float: right"> | </span>
    <a class="nav-child nav-child-right text-20-400" href="./">Übersicht</a>
    <a class="nav-child nav-child-left text-20-800" href="index.php">UnicacityAddon</a>
</nav>

<div style="text-align: center; height: 100vh;">
    <div style="position: relative;">
        <p class="text-80-700" style="text-align:">Login</p>
            <a href="./login">
                <button class="button-download">Login</button>
            </a>
    </div>
</div>

<div class="footer">
    <div class="footer-grid">
        <div class="grid-a">
            <img src="../common/img/UCLogo.png" height="100px" alt="Unicacity Logo">
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