<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include ('partials.head')
        @vite(['resources/css/SitoWeb/trova_la_forma.css', 'resources/js/SitoWeb/trova_la_forma.js'])
    </head>

    <body class="no-scroll-navbar bg-light">
        <main>
        @include('partials.navbar')
        <div class="container py-4">
            <!-- Prima riga di carte -->
            <div class="row mb-4">
                <div class="col-md-4">
                    <div class="card">
                        <img src="{{asset('storage/pics/viso_ovale.jpg')}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Viso Ovale</h5>
                            <p class="card-text">Armonioso e proporzionato.</br>
                            Tagli consigliati: Tutto è adatto, da capelli lunghi e scalati a corti pixie..</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <img src="{{asset('storage/pics/viso_quadrato.jpg')}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Viso quadrato</h5>
                            <p class="card-text">Mascella definita e tratti marcati.<br>
                            Tagli consigliati: Onde morbide e tagli scalati per addolcire i tratti..</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <img src="{{asset('storage/pics/viso_tondo.jpg')}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Viso tondo</h5>
                            <p class="card-text">Larghezza e altezza simili, guance piene.<br>
                            Tagli consigliati: Tagli lunghi e asimmetrici per allungare il viso.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Seconda riga di carte -->
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <img src="{{asset('storage/pics/viso_rettangolo.jpg')}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Viso rettangolare</h5>
                            <p class="card-text">Lungo e sottile con mascella dritta.<br>
                            Tagli consigliati: Frange morbide e onde per accorciare visivamente.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <img src="{{asset('storage/pics/viso_cuore.jpg')}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Viso cuore</h5>
                            <p class="card-text">Fronte larga, mento stretto.<br>
                            Tagli consigliati: Bob lunghi e frange laterali per bilanciare.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <img src="{{asset('storage/pics/viso_rombo.jpg')}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Viso rombo</h5>
                            <p class="card-text">Zigomi larghi, fronte e mento stretti.<br>
                            Tagli consigliati: Tagli medi scalati e onde morbide per armonizzare.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('partials.footer')
        </main>
    </body>
</html>
