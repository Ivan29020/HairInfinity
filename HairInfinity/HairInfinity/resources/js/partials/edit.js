import '../bootstrap';
import '../../css/partials/edit.css';

document.addEventListener('DOMContentLoaded', function() {
    const phoneContainer = document.getElementById('phone-container');
    const addPhoneButton = document.querySelector('.add-phone');

    addPhoneButton.addEventListener('click', function() {
      const phoneInputDiv = document.createElement('div');
      phoneInputDiv.classList.add('phone-input');

       const input = document.createElement('input');
       input.type = 'text';
       input.name = 'phones[]';
       input.classList.add('form-control');

      const removeButton = document.createElement('button');
      removeButton.textContent = 'Rimuovi';
      removeButton.type = 'button';
      removeButton.classList.add('remove-phone');

      removeButton.addEventListener('click', function() {
        phoneInputDiv.remove();
      });

      phoneInputDiv.appendChild(input);
      phoneInputDiv.appendChild(removeButton);
      phoneContainer.appendChild(phoneInputDiv);
    });
    // Gestione della rimozione dei numeri di telefono esistenti
    document.querySelectorAll('.remove-phone').forEach(button => {
      button.addEventListener('click', function() {
        this.closest('.phone-input').remove();
      });
    });
  });

