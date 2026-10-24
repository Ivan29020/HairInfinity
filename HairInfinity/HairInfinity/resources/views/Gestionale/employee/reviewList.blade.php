@vite(['resources/css/partials/dashboard.css', 'resources/js/partials/dashboard.js'])

@extends('partials.dashboardEmployee', [
        'button1Title' => 'Recensioni',
        'button1Number' => $totalReviews,
        'button1Url' => '#',
        'button2Title' => 'Clienti',
        'button2Number' => $totalCustomers,
        'button2Url' => '#',
        'button3Title' => 'Appuntamenti',
        'button3Number' => $totalAppointments,
        'button3Url' => '#',
        'pageTitle' => 'Recensione Page'
    ])

@section('content')
    <div class="tabella_container">
        <div class="element_container">
            <div class="barra_cerca">
                <form method="GET" action="{{ route('reviewList.index2') }}" class="search_form">
                    <div class="cerca_data">
                        <input type="text" name="query" value="{{ $query ?? '' }}" placeholder="Cerca"/>
                        <button type="submit">Cerca</button>
                    </div>
                </form>
                <button onclick="window.location.href='{{ route('reviews.create2') }}'" class="btn_aggiungi">Aggiungi Recensione</button>
            </div>
            <table class="element_table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Voto</th>
                    <th>Descrizione</th>
                    <th>ID Appuntamento</th>
                    <th>Azioni</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($reviews as $review)
                    <tr>
                        <td>{{ $review->review_id }}</td>
                        <td>{{ $review->rating }}</td>
                        <td>{{ $review->description }}</td>
                        <td>{{ $review->appointment_id }}</td>
                        <td>
                            <div class="action-buttons">
                                <a class="btn_modifica" href="{{ route('reviews.edit2', $review->review_id) }}">Modifica</a>
                                <form action="{{ route('reviews.destroy2', $review->review_id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn_elimina" onclick="return confirm('Sei sicuro di voler eliminare questo elemento?')">
                                        Elimina
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">Nessuna recensione trovata.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
            {{ $reviews->links() }}
        </div>
    </div>
@endsection
