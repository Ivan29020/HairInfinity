<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('partials.head')
    @vite(['resources/js/SitoWeb/show_staff.js', 'resources/css/SitoWeb/show_staff.css'])
</head>
<body class="no-scroll-navbar">
    @include('partials.navbar')
    <main class="show-staff">
        <div class="container2 py-10 mt-5">
            <div class="row">
                <!-- Titolo -->
                <h1 class="center-text">STAFF</h1>
                <!-- Prima card -->
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="row g-0">
                            <!-- Immagine a sinistra -->
                            <div class="col-md-4">
                                <img src="{{ asset('storage/pics/Albano.jpeg') }}" class="img-fluid rounded-start" alt="Example Image">
                            </div>
                            <!-- Testo a destra -->
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Giovanni Lametta</h5>
                                    <p class="card-text">Giovanni Lametta è il barbiere esperto che trasforma ogni barba in un capolavoro di precisione.
                                        Con anni di esperienza e un’abilità unica,è il punto di riferimento per chi cerca una rasatura impeccabile e una cura attenta della barba.
                                        Giovanni è sempre pronto a regalare a ogni cliente una barba ben curata e un aspetto impeccabile.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Seconda card -->
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="row g-0">
                            <!-- Immagine a sinistra -->
                            <div class="col-md-4">
                                <img src="{{ asset('storage/pics/Antonio_Splendente.jpg') }}" class="img-fluid rounded-start" alt="Example Image">
                            </div>
                            <!-- Testo a destra -->
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Antonio Splendente</h5>
                                    <p class="card-text">Antonio Splendente è l'estetista che porta la bellezza a nuovi livelli.
                                        Che si tratti di un trattamento viso rigenerante, di un massaggio rilassante o di una manicure perfetta,
                                        ogni servizio è realizzato con precisione e professionalità.
                                        La sua abilità nel far risplendere la pelle e la sua capacità di far sentire ogni cliente speciale lo
                                        rendono un punto di riferimento per chi cerca un look luminoso e una pelle radiosa.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Terza card -->
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="row g-0">
                            <!-- Immagine a sinistra -->
                            <div class="col-md-4">
                                <img src="{{ asset('storage/pics/Carlo_Pastello.jpg') }}" class="img-fluid rounded-start" alt="Example Image">
                            </div>
                            <!-- Testo a destra -->
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Carlo Pastello</h5>
                                    <p class="card-text">Carlo Pastello è il colorista che sa come trasformare ogni capello in un'opera d'arte.
                                        Che si tratti di un balayage delicato o di una tinta audace, ogni trattamento è pensato per esaltare la personalità di ogni cliente.
                                        La sua abilità nel mescolare tonalità diverse, proprio come un pittore con la sua tavolozza,
                                        lo rende il punto di riferimento per chi cerca un colore perfetto e naturale. </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Quarta card -->
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="row g-0">
                            <!-- Immagine a sinistra -->
                            <div class="col-md-4">
                                <img src="{{ asset('storage/pics/Dario_Capellone.jpg') }}" class="img-fluid rounded-start" alt="Another Example Image">
                            </div>
                            <!-- Testo a destra -->
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Dario Capellone</h5>
                                    <p class="card-text">Dario Capellone è il barbiere dal sorriso contagioso e dalla mano esperta. Con una passione per ogni tipo di acconciatura,
                                        Dario è noto per trasformare qualsiasi chioma in un capolavoro. La sua folta e curata capigliatura, sempre impeccabile,
                                        è la prova del suo talento e della cura che dedica a ogni dettaglio, rendendolo il punto di riferimento per chi cerca un taglio elegante e su misura.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @include('partials.footer')
</body>
</html>
