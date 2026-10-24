<!-- Barra superiore -->
@vite(['resources/js/partials/navbar.js', 'resources/css/partials/navbar.css'])
<div class="top-bar container-fluid d-flex justify-content-between align-items-center">
    <!-- Sezione sinistra: Logo -->
    <div class="top-bar-logo">
        <a href="/"><img src="{{ asset('storage\pics\logo.png') }}" alt="logo"></a>
    </div>

    <!-- Sezione destra: Navigazione e Icona di ricerca -->
    <div class="top-bar-right d-flex justify-content-end align-items-center">
        <nav class="top-bar-nav">
            <ul class="d-flex list-unstyled mb-0">
                <li><a href="/" class="text-decoration-none">Home</a></li>
                <li><a href="/contatti" class="text-decoration-none">Contatti</a></li>
                <li><a href="/chi-siamo" class="text-decoration-none">Chi siamo</a></li>
                <li><a href="/login" class="text-decoration-none">Login</a></li>
            </ul>
        </nav>
    </div>
</div>
