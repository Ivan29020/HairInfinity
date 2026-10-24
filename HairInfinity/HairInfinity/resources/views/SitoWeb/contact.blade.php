<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include ('partials.head')
    @vite(['resources/css/SitoWeb/app.css', 'resources/js/SitoWeb/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="no-scroll-navbar">
    @include ('partials.navbar')
    <main class="white flex flex-col items-center justify-center min-h-screen">

        <div class="bg-white shadow-md rounded px-12 pt-8 pb-10 mb-4 max-w-7xl w-full mx-auto">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">

                <!-- Sezione "Chi siamo e Recapiti" -->
                <div class="bg-gray-50 p-6 rounded-lg shadow flex flex-col justify-center items-center text-center">
                    <h1 class="text-3xl font-bold mb-8 text-gray-700 text-center">Contattaci ai nostri recapiti</h1><br>
                    <h2 class="text-2xl font-bold mb-4 text-gray-700">Chi siamo</h2>
                    <p class="text-gray-600 leading-relaxed mb-6">
                        Benvenuti nella nostra azienda! Siamo un team dedicato a
                        fornire soluzioni innovative e di alta qualità ai nostri clienti.
                        nel valore dell'eccellenza e del lavoro di squadra.
                    </p>

                    <h3 class="text-lg font-semibold text-gray-700 mb-2">Contatti</h3>
                    <ul class="text-gray-600 space-y-2">
                        <li><span class="font-bold">Indirizzo:</span> Via Roma, 123, Milano, Italia</li>
                        <li><span class="font-bold">Telefono:</span> +39 123 456 789</li>
                        <li><span class="font-bold">Email:</span> info@example.com</li>
                    </ul>

                    <h3 class="text-lg font-semibold text-gray-700 mt-6 mb-2">Orari</h3>
                    <ul class="text-gray-600 space-y-2">
                        <li><span class="font-bold">Lunedì - Venerdì:</span> 9:00 - 18:00</li>
                        <li><span class="font-bold">Sabato:</span> 10:00 - 14:00</li>
                        <li><span class="font-bold ">Domenica:</span> Chiuso</li>
                    </ul>

                    <br>
                    <a href="/chi-siamo" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg mt-4">
                        Scopri di più
                    </a>
                </div>

                <!-- Modulo di Contatto -->
                <div>
                    <h1 class="text-3xl font-bold mb-8 text-center">Modulo di Contatto</h1>

                    <!-- Mostra un messaggio di successo -->
                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Form -->
                    <form action="{{ route('contatti.send') }}" method="POST">
                        @csrf

                        <!-- Nome e Cognome -->
                        <div class="grid grid-cols-2 gap-6 mb-4" >
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="nome">Nome</label>
                                <input type="text" id="nome" name="nome" value="{{ old('nome') }}"
                                       class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                @error('nome')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="cognome">Cognome</label>
                                <input type="text" id="cognome" name="cognome" value="{{ old('cognome') }}"
                                       class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                @error('cognome')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Email</label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}"
                                   class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            @error('email')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Tipo di richiesta -->
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="tipo_richiesta">Tipo di richiesta</label>
                            <select id="tipo_richiesta" name="tipo_richiesta"
                                    class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                <option value="" disabled selected>Seleziona il tipo di richiesta</option>
                                <option value="informazioni" {{ old('tipo_richiesta') == 'informazioni' ? 'selected' : '' }}>Informazioni Generali</option>
                                <option value="supporto" {{ old('tipo_richiesta') == 'supporto' ? 'selected' : '' }}>Supporto</option>
                                <option value="altro" {{ old('tipo_richiesta') == 'altro' ? 'selected' : '' }}>Altro</option>
                            </select>
                            @error('tipo_richiesta')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Messaggio -->
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="messaggio">Messaggio</label>
                            <textarea id="messaggio" name="messaggio"
                                      class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                      rows="5">{{ old('messaggio') }}</textarea>
                            @error('messaggio')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Numero di telefono -->
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="telefono">Numero di telefono (opzionale)</label>
                            <input type="text" id="telefono" name="telefono" value="{{ old('telefono') }}"
                                   class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>

                        <!-- Informativa sulla privacy -->
                        <div class="mb-6">
                            <label class="inline-flex items-center">
                                <input type="checkbox" name="privacy" id="privacy"
                                       class="form-checkbox text-blue-600" {{ old('privacy') ? 'checked' : '' }}>
                                <span class="ml-2 text-gray-700">Accetto l'informativa sulla privacy</span>
                            </label>
                            @error('privacy')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Pulsante di invio -->
                        <div class="flex items-center justify-center">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                                Invia Richiesta
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    @include ('partials.footer')
</body>
</html>
