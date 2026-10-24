<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @vite(['resources/js/app.js', 'resources/css/app.css'])
    @include ('partials.head')
</head>

<body>
    @include ('partials.navbar')

    <!-- Carosello Bootstrap -->
    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('storage/pics/ragazza1.jpg') }}" class="d-block w-100" alt="Immagine 1">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('storage/pics/ragazza2.jpg') }}" class="d-block w-100" alt="Immagine 2">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('storage/pics/ragazza3.jpg') }}" class="d-block w-100" alt="Immagine 3">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('storage/pics/ragazza4.jpg') }}" class="d-block w-100" alt="Immagine 3">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('storage/pics/ragazza5.jpg') }}" class="d-block w-100" alt="Immagine 3">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- 1 immagine -->
    <div class="container my-5">
        <div class="row align-items-center">
            <!-- Colonna immagine -->
            <div class="col-md-6">
                <img src="{{ asset('storage/pics/chi_siamo.jpg') }}" class="img-fluid rounded"  width = "450px" alt="Immagine Descrittiva">
            </div>
            <!-- Colonna descrizione -->
            <div class="col-md-6">
                <h2 class="mb-3">InfinityHair</h2>
                <p class="image-description">
                InfinityHair è il salone di bellezza per eccellenza. Ogni giorno celebriamo e influenziamo il mondo dell’Hair Style.
                Da quasi 30 anni, siamo un punto di riferimento nel settore beauty,
                dedicandoci a sostenere la donna e l'uomo in tutte le fasi della sua vita e a valorizzare le linee naturali della sua bellezza.
                Unisciti alla nostra rete e scopri l’eccellenza del nostro metodo.
                </p>
                <p>
                    Contattaci oggi stesso per scoprire come possiamo aiutarti a raggiungere il tuo look ideale!
                </p>
                <a href="/contatti" class="btn btn-primary">Contattaci</a>
            </div>
        </div>
    </div>

    <!-- Video -->
    <div class="container-fluid my-5">
        <div class="row">
            <div class="col-12">
                <div class="ratio ratio-16x9">
                    <video class="w-100" controls>
                        <source src="{{ asset('storage/video/Milano.mp4') }}" type="video/mp4">
                        Il tuo browser non supporta il tag video.
                    </video>
                </div>
            </div>
        </div>
    </div>

    <!-- 2 immagine -->
    <div class="container my-5">
        <div class="row align-items-center">
            <!-- Colonna descrizione -->
            <div class="col-md-6">
                <h2 class="mb-3">TROVA LA TUA FORMA</h2>
                <p class = "image-description">Scopri l’innovativo Face Design, creato per valorizzare i lineamenti del tuo viso con un taglio su misura.
                    Raggiungi l’equilibrio tra stile e unicità.
                </p>
                <p>
                    Scopri come i nostri esperti possono trasformare il tuo look con trattamenti e prodotti di alta qualità.
                </p>
                <a href="/trova_la_forma" class="btn btn-primary">Scopri di più</a>
            </div>
            <!-- Colonna immagine -->
            <div class="col-md-6">
                <img src="{{ asset('storage/pics/forma_del_viso.jpg') }}" class="img-fluid rounded" alt="Un'Evoluzione di Stile">
            </div>
        </div>
    </div>

     <!-- 3 immagine -->
     <div class="container my-5">
        <div class="row align-items-center">
            <!-- Colonna immagine -->
            <div class="col-md-6">
                <img src="{{ asset('storage/pics/Dario_Capellone.jpg') }}" class="img-fluid rounded" alt="Immagine Descrittiva">
            </div>
            <!-- Colonna descrizione -->
            <div class="col-md-6">
                <h2 class="mb-3">Lo staff</h2>
                <p>
                Scopri il nostro team di esperti! Ogni membro del nostro staff è altamente qualificato e appassionato di offrire i migliori servizi per la tua bellezza e benessere.
                 Clicca per conoscere meglio chi c'è dietro la nostra qualità e professionalità.
                </p>
                <a href="/show_staff" class="btn btn-primary">Scopri di più</a>
            </div>
        </div>
    </div>

    @include ('partials.footer')

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>


</body>

</html>
