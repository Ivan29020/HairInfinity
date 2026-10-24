<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('partials.head')
    @vite(['resources/js/SitoWeb/about_us.js', 'resources/css/SitoWeb/about_us.css'])
</head>

<body class="no-scroll-navbar bg-gray-50 main-container">
@include('partials.navbar')
<main class="container mx-auto">
    <!-- Company Description -->
    <section class="company-description mt-8 bg-white shadow-lg p-16 rounded-xl max-w-5xl mx-auto">
        <h2 class="text-4xl font-extrabold text-gray-800 mb-10 text-center">
            Chi Siamo
        </h2>
        <p class="text-gray-700 leading-relaxed text-lg text-center mx-auto max-w-3xl">
            Benvenuti da Infinity Hair, il salone dove ogni dettaglio è pensato per offrirti un’esperienza di bellezza unica e indimenticabile.
            <br /><br />
            Siamo un team di professionisti appassionati, sempre aggiornati sulle ultime tendenze per valorizzare al meglio la tua personalità e il tuo stile.
            Dal taglio classico a quello più audace, dalla colorazione naturale ai look più innovativi, mettiamo a tua disposizione la nostra esperienza e creatività.
            <br /><br />
            Crediamo che prendersi cura dei capelli significhi anche prendersi cura di sé stessi: per questo utilizziamo solo prodotti di altissima qualità, rispettosi della salute dei capelli e dell’ambiente.
            <br /><br />
            Il nostro salone è uno spazio accogliente e rilassante, dove potrai lasciarti coccolare e dedicarti un momento di puro benessere.
            <br /><br />
            Che tu stia cercando un look sofisticato o un cambiamento radicale, a Infinity Hair trasformeremo la tua idea in realtà.
            Vieni a trovarci e scopri come possiamo aiutarti a esprimere il meglio di te. Perché il tuo stile non ha confini, e noi siamo qui per celebrarlo.
        </p>
    </section>

    <!-- Map Section -->
    <section class="map-section mt-20 bg-white shadow-lg p-12 rounded-xl max-w-5xl mx-auto">
        <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">
            Dove potete trovarci?
        </h2>
        <div class="iframe-container rounded-lg overflow-hidden shadow-md mx-auto">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2793.37680926043!2d9.156170675933668!3d45.562860626850934!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4786bfa51f6fae63%3A0x7b0bf63133ef1829!2sVia%20Roma%2C%20123%2C%2020037%20Paderno%20Dugnano%20MI!5e0!3m2!1sit!2sit!4v1735557488930!5m2!1sit!2sit"
                style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                width="100%" height="450">
            </iframe>
        </div>
    </section>

    <!-- Information Section -->
    <section class="information-section mt-20 bg-white shadow-lg p-12 rounded-xl max-w-4xl mx-auto">
        <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">
            Informazioni
        </h2>
        <div class="text-lg text-gray-700 space-y-6 mx-auto max-w-3xl text-center">
            <p><span class="font-semibold text-blue-600">Città:</span> Milano</p>
            <p><span class="font-semibold text-blue-600">Indirizzo:</span> Via Roma, 123, Milano, Italia</p>
            <p><span class="font-semibold text-blue-600">Telefono:</span> +39 123 456 789</p>
        </div>
    </section>
</main>
@include('partials.footer')
</body>
</html>
