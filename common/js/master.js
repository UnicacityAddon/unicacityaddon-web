// navbar color to black on scroll
window.onscroll = function() {
    if (document.body.scrollTop > 0 || document.documentElement.scrollTop > 0) {
        document.getElementById("nav").style.backgroundColor = "#3f3f3f";
    } else {
        document.getElementById("nav").style.backgroundColor = "transparent";
    }
};

// switch between login and register
function switchTo(form) {
    if (form === 'login') {
        document.getElementById("login").style.display = "flex";
        document.getElementById("register").style.display = "none";
    } else {
        document.getElementById("login").style.display = "none";
        document.getElementById("register").style.display = "flex";
    }
}