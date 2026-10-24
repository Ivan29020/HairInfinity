@vite(['resources/css/partials/homeDashboard.css', 'resources/js/partials/dashboard2.js'])

<div class="dashboard">
    <!-- Sidebar -->
    <div id="sidebar" class="sidebar">
        <!-- Intestazione della sidebar -->
        <div class="sidebar-header">
            <h2>Menu</h2>
            <button id="close-btn" class="close-btn">&times;</button>
        </div>
        <ul class="sidebar-menu">
            <li class="nav-item">
                <a class="nav-link" href="/employee/dashboard/home">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" ><path fill="currentColor" d="M14 9q-.425 0-.712-.288T13 8V4q0-.425.288-.712T14 3h6q.425 0 .713.288T21 4v4q0 .425-.288.713T20 9zM4 13q-.425 0-.712-.288T3 12V4q0-.425.288-.712T4 3h6q.425 0 .713.288T11 4v8q0 .425-.288.713T10 13zm10 8q-.425 0-.712-.288T13 20v-8q0-.425.288-.712T14 11h6q.425 0 .713.288T21 12v8q0 .425-.288.713T20 21zM4 21q-.425 0-.712-.288T3 20v-4q0-.425.288-.712T4 15h6q.425 0 .713.288T11 16v4q0 .425-.288.713T10 21z"/>                            </svg>
                    <span class="ms-2">Home</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/employee/dashboard/appointments">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" fill-rule="evenodd" d="M5.586 4.586C5 5.172 5 6.114 5 8v9c0 1.886 0 2.828.586 3.414S7.114 21 9 21h6c1.886 0 2.828 0 3.414-.586S19 18.886 19 17V8c0-1.886 0-2.828-.586-3.414S16.886 4 15 4H9c-1.886 0-2.828 0-3.414.586M9 8a1 1 0 0 0 0 2h6a1 1 0 1 0 0-2zm0 4a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2zm0 4a1 1 0 1 0 0 2h4a1 1 0 1 0 0-2z" clip-rule="evenodd"/></svg>
                    <span class="ms-2">Appuntamenti</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/employee/dashboard/products">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M13.409 2.513a3.75 3.75 0 0 0-2.818 0l-2.19.888l9.592 3.73l3.374-1.303a1.8 1.8 0 0 0-.46-.275zM22 7.191l-9.25 3.574v10.923q.336-.068.659-.199l7.498-3.04A1.75 1.75 0 0 0 22 16.827zM11.25 21.688V10.765L2 7.191v9.637a1.75 1.75 0 0 0 1.093 1.621l7.498 3.04q.323.13.659.2M2.633 5.828L12 9.447l3.917-1.514l-9.543-3.71l-3.281 1.33q-.256.104-.46.275"/></svg>
                    <span class="ms-2">Prodotti</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/employee/dashboard/reviews">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M14.5 15q.825 0 1.413-.587T16.5 13t-.587-1.412T14.5 11q-.375 0-.712.138t-.613.362L10.5 10.15v-.3l2.675-1.35q.275.225.613.363T14.5 9q.825 0 1.413-.587T16.5 7t-.587-1.412T14.5 5t-1.412.588T12.5 7v.15L9.825 8.5q-.275-.225-.612-.363T8.5 8q-.825 0-1.412.588T6.5 10t.588 1.413T8.5 12q.375 0 .713-.137t.612-.363l2.675 1.35V13q0 .825.588 1.413T14.5 15M6 18l-2.3 2.3q-.475.475-1.088.213T2 19.575V4q0-.825.588-1.412T4 2h16q.825 0 1.413.588T22 4v12q0 .825-.587 1.413T20 18z"/></svg>
                    <span class="ms-2">Recensioni</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/employee/dashboard/customers">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M6.5 7.5a5.5 5.5 0 1 1 11 0a5.5 5.5 0 0 1-11 0M3 19a5 5 0 0 1 5-5h8a5 5 0 0 1 5 5v3H3z"/></svg>
                    <span class="ms-2">Clienti</span>
                </a>
            </li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- TopBar -->
        <div class="topbar">
            <!-- Titolo della pagina -->
            <button id="menu-btn" class="menu-btn">☰</button>
            <h1 class="titlePage">{{ $pageTitle }}</h1>

            <!-- Bottone di Logout -->
            <ul class="wrapper">
                <li class="icon Logout">
                    <span class="tooltip">Logout</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" style="background: none; border: none; padding:0; margin:0;" >
                            <svg height="1.8em" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="Logout">
                                <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="1.5">
                                    <path d="M12 20a8 8 0 1 1 0-16" opacity="0.5"/>
                                    <path stroke-linejoin="round" d="M10 12h10m0 0l-3-3m3 3l-3 3"/></g>
                            </svg>
                        </button>
                    </form>
                </li>
            </ul>
        </div>

        <!-- Bottoni -->
        <div class="Bottoni">
            <!-- Btn 1 -->
            <a class="Singolo_Bottone_URL" href="{{ $button1Url }}">
                <div class="Singolo_Bottone " style="background-image: url('{{ asset('storage/pics/icon/sfondo_button_dipendenti.png') }}');background-size: cover; background-position: center; width: 240px; height: 80px;">
                    <p class="Singolo_Bottone_titolo"> {{ $button1Title }} </p>
                    <p class="Singolo_Bottone_numero"> {{ $button1Number }} </p>
                </div>
            </a>

            <!-- Btn 2 -->
            <a class="Singolo_Bottone_URL" href="{{ $button2Url }}">
                <div class="Singolo_Bottone" style="background-image: url('{{ asset('storage/pics/icon/sfondo_button_clienti.png') }}');background-size: cover; background-position: center;width: 240px; height: 80px;">
                    <p class="Singolo_Bottone_titolo"> {{ $button2Title }} </p>
                    <p class="Singolo_Bottone_numero"> {{ $button2Number }} </p>
                </div>
            </a>

            <!-- Btn 3 -->
            <a class="Singolo_Bottone_URL" href="{{ $button3Url }}">
                <div class="Singolo_Bottone" style="background-image: url('{{ asset('storage/pics/icon/sfondo_button_Prodotti.png') }}');background-size: cover; background-position: center;width: 240px; height: 80px;">
                    <p class="Singolo_Bottone_titolo"> {{ $button3Title }} </p>
                    <p class="Singolo_Bottone_numero"> {{ $button3Number }} </p>
                </div>
            </a>
        </div>

        @yield('content')
    </div>
</div>
