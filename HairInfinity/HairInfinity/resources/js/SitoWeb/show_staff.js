import '../bootstrap';
import '../../css/SitoWeb/show_staff.css';

document.addEventListener('DOMContentLoaded', function () {
    const cards = document.querySelectorAll('.card');

    // Aggiungi clic sulle card
    cards.forEach((card) => {
        card.addEventListener('click', () => {
            // Chiudi tutte le altre card
            cards.forEach((otherCard) => {
                if (otherCard !== card) {
                    otherCard.classList.remove('expanded');
                }
            });

            // Alterna la classe "expanded" sulla card cliccata
            card.classList.toggle('expanded');
        });
    });
});
