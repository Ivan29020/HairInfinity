@vite(['resources/css/partials/dashboard.css', 'resources/js/partials/dashboard.js'])
@vite(['resources/css/partials/homeDashboard.css'])

@extends('partials.dashboardHomeEmployee')

@section('content')
    <div class="container">
        <!-- RIGA 1 -->
        <div class="row">
            <div class="flip-card" onclick="flipCard(this)">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <p class="title">Appuntamenti</p>
                        <div class="card-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path fill="currentColor" fill-rule="evenodd"
                                      d="M5.586 4.586C5 5.172 5 6.114 5 8v9c0 1.886 0 2.828.586 3.414S7.114 21 9 21h6c1.886 0 2.828 0 3.414-.586S19 18.886 19 17V8c0-1.886 0-2.828-.586-3.414S16.886 4 15 4H9c-1.886 0-2.828 0-3.414.586M9 8a1 1 0 0 0 0 2h6a1 1 0 1 0 0-2zm0 4a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2zm0 4a1 1 0 1 0 0 2h4a1 1 0 1 0 0-2z"
                                      clip-rule="evenodd"/>
                            </svg>
                        </div>
                    </div>
                    <div class="flip-card-back">
                        <p class="title">Totale</p>
                        <p class="number">{{ $totalAppointments }}</p>
                    </div>
                </div>
            </div>
            <div class="flip-card" onclick="flipCard(this)">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <p class="title">Prodotti</p>
                        <div class="card-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                      d="M13.409 2.513a3.75 3.75 0 0 0-2.818 0l-2.19.888l9.592 3.73l3.374-1.303a1.8 1.8 0 0 0-.46-.275zM22 7.191l-9.25 3.574v10.923q.336-.068.659-.199l7.498-3.04A1.75 1.75 0 0 0 22 16.827zM11.25 21.688V10.765L2 7.191v9.637a1.75 1.75 0 0 0 1.093 1.621l7.498 3.04q.323.13.659.2M2.633 5.828L12 9.447l3.917-1.514l-9.543-3.71l-3.281 1.33q-.256.104-.46.275"/>
                            </svg>
                        </div>
                    </div>
                    <div class="flip-card-back">
                        <p class="title">Totale</p>
                        <p class="number">{{ $totalProducts }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- RIGA 2 -->
        <div class="row">
            <div class="flip-card" onclick="flipCard(this)">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <p class="title">Recensioni</p>
                        <div class="card-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                      d="M14.5 15q.825 0 1.413-.587T16.5 13t-.587-1.412T14.5 11q-.375 0-.712.138t-.613.362L10.5 10.15v-.3l2.675-1.35q.275.225.613.363T14.5 9q.825 0 1.413-.587T16.5 7t-.587-1.412T14.5 5t-1.412.588T12.5 7v.15L9.825 8.5q-.275-.225-.612-.363T8.5 8q-.825 0-1.412.588T6.5 10t.588 1.413T8.5 12q.375 0 .713-.137t.612-.363l2.675 1.35V13q0 .825.588 1.413T14.5 15M6 18l-2.3 2.3q-.475.475-1.088.213T2 19.575V4q0-.825.588-1.412T4 2h16q.825 0 1.413.588T22 4v12q0 .825-.587 1.413T20 18z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="flip-card-back">
                        <p class="title">Totale</p>
                        <p class="number">{{ $totalReviews }}</p>
                    </div>
                </div>
            </div>
            <div class="flip-card" onclick="flipCard(this)">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <p class="title">Clienti</p>
                        <div class="card-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                      d="M6.5 7.5a5.5 5.5 0 1 1 11 0a5.5 5.5 0 0 1-11 0M3 19a5 5 0 0 1 5-5h8a5 5 0 0 1 5 5v3H3z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="flip-card-back">
                        <p class="title">Totale</p>
                        <p class="number">{{ $totalCustomers }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function flipCard(card) {
            card.querySelector('.flip-card-inner').classList.toggle('flipped');
        }
    </script>

@endsection
