/**
 * references
 */
const preloader = document.getElementById("preloader");
const navbar_toggler = document.getElementById("navbar-toggler");
const navbar_dark_overlay = document.querySelector(".dark-overlay");
const navbarcollapse = document.getElementById("navbarcollapse");
/**
 * Variables
 */

const document_loading_start_time = Date.now();
let animation_loading_time = 2980; //3000 milisec -> 3sec

/**
 * functions ------------------------------------------------------------------------------------------------------------------------------------>
 */

/**
 * Normal functions
 */

/**
 * callback functions
 */

// navbar toggle controller function
const navbar_toggle = () => {
    navbar_toggler.classList.toggle("open");
    navbarcollapse.classList.toggle("navbar-collapse-toggle");
    if (navbarcollapse.classList.contains("navbar-collapse-toggle")) {
        navbarcollapse.style.opacity = "1";
        navbarcollapse.style.pointerEvents = "all";
    } else {
        navbarcollapse.style.opacity = "0";
        navbarcollapse.style.pointerEvents = "none";
    }
    setTimeout(() => {
        navbar_dark_overlay.classList.toggle("navbar_darkOverlay_toggle");
    }, 200);
};

/**
 * Event listeners
 */

setTimeout(() => {
    preloader.classList.add("close");
}, animation_loading_time);
navbar_toggler.addEventListener("click", navbar_toggle);
