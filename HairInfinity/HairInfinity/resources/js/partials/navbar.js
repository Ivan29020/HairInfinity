import '../bootstrap';
import '../../css/partials/navbar.css';

document.addEventListener("DOMContentLoaded", function () {
    const navbar = document.querySelector(".top-bar");
    const isPageWithNoScroll = document.body.classList.contains("no-scroll-navbar"); // Verifica la classe sulla pagina
    const content = document.querySelector("body");
    const mainContent = document.querySelector("main");
    const isPageShort = document.body.scrollHeight <= window.innerHeight;

    function updateNavbar() {
        if (isPageWithNoScroll) {
            // Se siamo su una pagina con `no-scroll-navbar`, disabilita scroll
            navbar.classList.remove("scrolled");
            navbar.style.backgroundColor = "#2f2f46"; // Sfondo permanente blu scuro
            return; // Esce dalla funzione senza applicare altri effetti
        }
        if (isPageShort) {
            // Se la pagina è corta
            navbar.classList.add("sticky");
            navbar.style.backgroundColor = "#171923"; // Sfondo blu permanente
            content.style.marginTop = `${navbar.offsetHeight}px`;
        } else if (window.scrollY > 50) {
            // Se la pagina è lunga e si fa lo scroll
            navbar.classList.add("scrolled");
            navbar.classList.remove("short");
            content.style.marginTop = "";
            content.style.paddingTop = ""; // Rimuove eventuale padding-top
        } else {
            // Navbar iniziale per pagine lunghe
            navbar.classList.remove("scrolled");
            navbar.style.backgroundColor = "";
            content.style.marginTop = "";
        }
    }

    // Applica lo stato iniziale al caricamento
    updateNavbar();

    // Applica lo stato durante lo scroll
    document.addEventListener("scroll", updateNavbar);

    // Riassegna sfondo/blocco dinamico quando si ridimensiona la finestra
    window.addEventListener("resize", function () {
        updateNavbar();
    });
});
