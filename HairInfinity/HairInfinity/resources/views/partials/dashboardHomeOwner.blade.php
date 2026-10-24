@vite(['resources/css/partials/homeDashboard.css', 'resources/js/partials/dashboard2.js'])

<div class="dashboard">
    <!-- Sidebar -->
    <div id="sidebar" class="sidebar">
        <!-- Intestazione della sidebar -->
        <div class="sidebar-header">
            <h2>Menu</h2>
            <button id="close-btn" class="close-btn">&times;</button>
        </div>
        <!-- Link della sidebar -->
        <ul class="sidebar-menu">
            <li class="nav-item">
                <a class="nav-link" href="/owner/dashboard/home">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" ><path fill="currentColor" d="M14 9q-.425 0-.712-.288T13 8V4q0-.425.288-.712T14 3h6q.425 0 .713.288T21 4v4q0 .425-.288.713T20 9zM4 13q-.425 0-.712-.288T3 12V4q0-.425.288-.712T4 3h6q.425 0 .713.288T11 4v8q0 .425-.288.713T10 13zm10 8q-.425 0-.712-.288T13 20v-8q0-.425.288-.712T14 11h6q.425 0 .713.288T21 12v8q0 .425-.288.713T20 21zM4 21q-.425 0-.712-.288T3 20v-4q0-.425.288-.712T4 15h6q.425 0 .713.288T11 16v4q0 .425-.288.713T10 21z"/>                            </svg>
                    <span class="ms-2">Home</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/owner/dashboard/appointments">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" fill-rule="evenodd" d="M5.586 4.586C5 5.172 5 6.114 5 8v9c0 1.886 0 2.828.586 3.414S7.114 21 9 21h6c1.886 0 2.828 0 3.414-.586S19 18.886 19 17V8c0-1.886 0-2.828-.586-3.414S16.886 4 15 4H9c-1.886 0-2.828 0-3.414.586M9 8a1 1 0 0 0 0 2h6a1 1 0 1 0 0-2zm0 4a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2zm0 4a1 1 0 1 0 0 2h4a1 1 0 1 0 0-2z" clip-rule="evenodd"/></svg>
                    <span class="ms-2">Appuntamenti</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/owner/dashboard/services">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 582 582"><path fill="currentColor" d="m256 192l-39.5-39.5c4.9-12.6 7.5-26.2 7.5-40.5C224 50.1 173.9 0 112 0S0 50.1 0 112s50.1 112 112 112c14.3 0 27.9-2.7 40.5-7.5L192 256l-39.5 39.5c-12.6-4.9-26.2-7.5-40.5-7.5C50.1 288 0 338.1 0 400s50.1 112 112 112s112-50.1 112-112c0-14.3-2.7-27.9-7.5-40.5L499.2 76.8c7.1-7.1 7.1-18.5 0-25.6c-28.3-28.3-74.1-28.3-102.4 0zm22.6 150.6l118.2 118.2c28.3 28.3 74.1 28.3 102.4 0c7.1-7.1 7.1-18.5 0-25.6L342.6 278.6zM64 112a48 48 0 1 1 96 0a48 48 0 1 1-96 0m48 240a48 48 0 1 1 0 96a48 48 0 1 1 0-96"/></svg>
                    <span class="ms-2">Servizi</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/owner/dashboard/products">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M13.409 2.513a3.75 3.75 0 0 0-2.818 0l-2.19.888l9.592 3.73l3.374-1.303a1.8 1.8 0 0 0-.46-.275zM22 7.191l-9.25 3.574v10.923q.336-.068.659-.199l7.498-3.04A1.75 1.75 0 0 0 22 16.827zM11.25 21.688V10.765L2 7.191v9.637a1.75 1.75 0 0 0 1.093 1.621l7.498 3.04q.323.13.659.2M2.633 5.828L12 9.447l3.917-1.514l-9.543-3.71l-3.281 1.33q-.256.104-.46.275"/></svg>
                    <span class="ms-2">Prodotti</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/owner/dashboard/reviews">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M14.5 15q.825 0 1.413-.587T16.5 13t-.587-1.412T14.5 11q-.375 0-.712.138t-.613.362L10.5 10.15v-.3l2.675-1.35q.275.225.613.363T14.5 9q.825 0 1.413-.587T16.5 7t-.587-1.412T14.5 5t-1.412.588T12.5 7v.15L9.825 8.5q-.275-.225-.612-.363T8.5 8q-.825 0-1.412.588T6.5 10t.588 1.413T8.5 12q.375 0 .713-.137t.612-.363l2.675 1.35V13q0 .825.588 1.413T14.5 15M6 18l-2.3 2.3q-.475.475-1.088.213T2 19.575V4q0-.825.588-1.412T4 2h16q.825 0 1.413.588T22 4v12q0 .825-.587 1.413T20 18z"/></svg>
                    <span class="ms-2">Recensioni</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/owner/dashboard/employees">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none"><path d="m12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035q-.016-.005-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093q.019.005.029-.008l.004-.014l-.034-.614q-.005-.018-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z"/><path fill="currentColor" d="M18.8 6.4c-1.884-2.512-4.28-3.9-6.8-3.9S7.084 3.888 5.2 6.4c-1.417 1.889-3.126 4.44-3.362 7.124c-.121 1.384.147 2.801 1.019 4.15c.861 1.332 2.268 2.531 4.315 3.58c1.259.645 2.63-.22 2.809-1.483a6.5 6.5 0 0 1-1.162-1.001c-1.013-1.105-1.82-2.723-1.82-4.77c0-3.428 1.77-5.735 3.9-6.344c.282-.08.6.132.634.424a5 5 0 0 0 4.917 4.42c.674.006.55 1.06.55 1.5c0 2.047-.806 3.665-1.82 4.77c-.362.396-.76.734-1.164 1.003c.16 1.268 1.518 2.14 2.778 1.531c2.165-1.044 3.643-2.243 4.538-3.585c.907-1.362 1.163-2.797 1.007-4.194c-.3-2.69-2.138-5.257-3.54-7.125Z"/></g></svg>
                    <span class="ms-2">Dipendenti</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/owner/dashboard/customers">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M6.5 7.5a5.5 5.5 0 1 1 11 0a5.5 5.5 0 0 1-11 0M3 19a5 5 0 0 1 5-5h8a5 5 0 0 1 5 5v3H3z"/></svg>
                    <span class="ms-2">Clienti</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/owner/dashboard/receipts">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 16 16"><path fill="currentColor" d="M2 3.75C2 2.784 2.784 2 3.75 2h5.5c.966 0 1.75.784 1.75 1.75V10h3v1.5a2.5 2.5 0 0 1-2.5 2.5h-7A2.5 2.5 0 0 1 2 11.5zM11 13h.5a1.5 1.5 0 0 0 1.5-1.5V11h-2zM4.5 5.5A.5.5 0 0 0 5 6h3a.5.5 0 0 0 0-1H5a.5.5 0 0 0-.5.5m.5 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1zm-.5 3a.5.5 0 0 0 .5.5h1.5a.5.5 0 0 0 0-1H5a.5.5 0 0 0-.5.5"/></svg>
                    <span class="ms-2">Scontrini</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/owner/dashboard/suppliers">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M14.748 17.205H9.872c-.331 1.448-1.602 2.545-3.148 2.545c-1.545 0-2.816-1.097-3.148-2.546H3a.75.75 0 0 1-.75-.75V6c0-.966.784-1.75 1.75-1.75h9.793c.967 0 1.75.784 1.75 1.75v1.432h1.51c.742 0 1.452.299 1.97.83l2.514 2.578a.75.75 0 0 1 .213.524v5.09a.75.75 0 0 1-.705.75c-.331 1.448-1.603 2.546-3.148 2.546s-2.817-1.097-3.149-2.546m-8.024-2.546c-.94 0-1.733.786-1.733 1.795c0 1.01.794 1.796 1.733 1.796s1.733-.786 1.733-1.796c0-1.009-.793-1.795-1.733-1.795m11.173 0c-.94 0-1.733.786-1.733 1.795c0 1.01.793 1.796 1.733 1.796c.939 0 1.732-.786 1.732-1.796c0-1.009-.793-1.795-1.732-1.795"/></svg>
                    <span class="ms-2">Fornitori</span>
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
            <h1 class="titlePage">Home Page</h1>

            <!-- Bottone di Logout -->
            <ul class="wrapper">
                <li class="icon Logout">
                    <span class="tooltip">Logout</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" style="background: none; border: none; padding:0; margin:0;" >
                            <svg height="1.8em" fill="" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="Logout">
                                <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="1.5">
                                    <path d="M12 20a8 8 0 1 1 0-16" opacity="0.5"/>
                                    <path stroke-linejoin="round" d="M10 12h10m0 0l-3-3m3 3l-3 3"/></g>
                            </svg>
                        </button>
                    </form>
                </li>
            </ul>
        </div>

        @yield('content')
    </div>
</div>
