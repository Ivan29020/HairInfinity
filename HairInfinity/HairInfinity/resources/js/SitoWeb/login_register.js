import '../bootstrap';
import '../../css/SitoWeb/login_register.css';

/*=============== SHOW HIDDEN - PASSWORD ===============*/
const showHiddenPass = (loginPass, loginEye) =>{
   const input = document.getElementById(loginPass),
         iconEye = document.getElementById(loginEye)

   iconEye.addEventListener('click', () =>{
      // Change password to text
      if(input.type === 'password'){
         // Switch to text
         input.type = 'text'

         // Icon change
         iconEye.classList.add('ri-eye-line')
         iconEye.classList.remove('ri-eye-off-line')
      } else{
         // Change to password
         input.type = 'password'

         // Icon change
         iconEye.classList.remove('ri-eye-line')
         iconEye.classList.add('ri-eye-off-line')
      }
   })
}

showHiddenPass('password','login-eye')

// funzione genere
function formatSessoInput() {
   document.getElementById('sesso').addEventListener('input', function() {
       this.value = this.value.charAt(0).toUpperCase() + this.value.slice(1).toLowerCase();
   });
}

// funzioni placeholder
function showPlaceholder() {
   var input = document.getElementById("sesso");
   var label = document.getElementById("sessoLabel");
   input.placeholder = "Inserisci M o F ";
   label.style.display = "none";
}

function hidePlaceholder() {
   var input = document.getElementById("sesso");
   var label = document.getElementById("sessoLabel");
   if (input.value === "") {
       input.placeholder = "";
       label.style.display = "inline-block";
   }
}


