// navbar color to black on scroll
window.onscroll = function() {
    if (document.body.scrollTop > 0 || document.documentElement.scrollTop > 0) {
        document.getElementById("nav").style.backgroundColor = "rgba(0, 0, 0, 0.5)";
    } else {
        document.getElementById("nav").style.backgroundColor = "transparent";
    }
};

window.onload = async function() {
    const downloadLink = await getDownloadLink();

    document.getElementById('nav').innerHTML = `
        <a class="nav-child nav-child-right text-20-400" id="downloadLink" href=${downloadLink}>Download</a>
        <span class="nav-child text-20-400" style="float: right"> | </span>
        <a class="nav-child nav-child-right text-20-400" href="/player">Spieler</a>
        <a class="nav-child nav-child-right text-20-400" href="/banner">Banner</a>
        <a class="nav-child nav-child-right text-20-400" href="/houseBans">House Bans</a>
        <a class="nav-child nav-child-right text-20-400" href="/wantedReasons">Wanted Reasons</a>
        <a class="nav-child nav-child-right text-20-400" href="/team">Team</a>
        <a class="nav-child nav-child-right text-20-400" href="https://wiki.unicacityaddon.rettichlp.de/">Wiki</a>
        <a class="nav-child nav-child-right text-20-400" href="https://github.com/UnicacityAddon/unicacityaddon-addon/tree/main">GitHub</a>
        <a class="nav-child nav-child-left text-20-800" href="/">UnicacityAddon</a>`;

    document.getElementById('footer').innerHTML = `
        <div class="footer-grid">
            <div class="grid-a">
                <img src="common/img/UCLogo_new.png" height="100px" alt="Unicacity Logo">
            </div>
            <div class="grid-b grid-right">
                <p class="text-20-800">Support</p>
                <a class="text-14-400" style="text-decoration: none; color: white;" href="https://discord.gg/A9u5eY7CbS">UnicacityAddon Discord</a><br>
                <a class="text-14-400" style="text-decoration: none; color: white;" href="https://github.com/UnicacityAddon/unicacityaddon-addon/issues/new?assignees=&labels=bug&projects=&template=bug.md&title=UCA+-+short+description">You found a bug?</a><br>
                <a class="text-14-400" style="text-decoration: none; color: white;" href="https://github.com/UnicacityAddon/unicacityaddon-addon/issues/new?assignees=&labels=enhancement&projects=&template=feature.md&title=UCA+-+short+description">You have an idea for a new feature?</a><br>
                <a class="text-14-400" style="text-decoration: none; color: white;" href="https://wiki.unicacityaddon.rettichlp.de/">Wiki</a><br>
                <a class="text-14-400" style="text-decoration: none; color: white;" href="https://unicacity.de/teamspeak">UnicaCity TeamSpeak</a><br>
            </div>
            <div class="grid-c grid-right">
                <p class="text-20-800">Gameplay</p>
                <a class="text-14-400" style="text-decoration: none; color: white;" href="/wantedReasons">Wanted Reasons</a><br>
                <a class="text-14-400" style="text-decoration: none; color: white;" href="/houseBans">House Bans</a><br>
                <a class="text-14-400" style="text-decoration: none; color: white;" href="/banner">Banner</a><br>
                <a class="text-14-400" style="text-decoration: none; color: white;" href="/player">Spieler</a><br>
                <a class="text-14-400" style="text-decoration: none; color: white;" href="/gangwar">Gangwar</a><br>
            </div>
            <div class="grid-d grid-right">
                <p class="text-20-800">Development</p>
                <a class="text-14-400" style="text-decoration: none; color: white;" href="https://github.com/UnicacityAddon/unicacityaddon-addon/tree/main">Code @ GitHub</a><br>
                <a class="text-14-400" style="text-decoration: none; color: white;" href="https://github.com/UnicacityAddon/unicacityaddon-addon/releases">Versions @ GitHub</a><br>
                <a class="text-14-400" style="text-decoration: none; color: white;" href="https://wiki.labymod.net/">LabyMod 4 Documentation</a><br>
            </div>
            <div class="grid-e grid-right">
                <p class="text-20-800">Download</p>
                <a class="text-14-400" style="text-decoration: none; color: white;" href="${downloadLink}">UnicacityAddon</a><br>
                <a class="text-14-400" style="text-decoration: none; color: white;" href="https://www.labymod.net/de/download">Labymod 4</a><br>
            </div>
            <div class="grid-f grid-right">
                <p  class="text-14-400" style="color: var(--gray)">UnicacityAddon<br>© <?php echo date("Y"); ?> RettichLP and Dimiikou</p>
            </div>
        </div>`;

    await fetchAndDisplayContent();
}

function getLatestVersion() {
    return fetch('http://rettichlp.de:8888/unicacityaddon/v1/dhgpsklnag2354668ec1d905xcv34d9bdee4b877/mgmt')
        .then(response => response.json())
        .then(json => json.latestVersion)
        .catch(error => {
            console.error('Cannot load latest version:', error);
            return null;
        });
}

async function getDownloadLink() {
    return getLatestVersion()
        .then(latestVersion => latestVersion !== null
            ? "https://github.com/UnicacityAddon/unicacityaddon-addon/releases/download/v" + latestVersion + "/UnicacityAddon-" + latestVersion + ".jar"
            : "https://github.com/UnicacityAddon/unicacityaddon-addon/releases/latest")
        .catch(error => {
            console.error('Cannot load latest version:', error);
        });
}