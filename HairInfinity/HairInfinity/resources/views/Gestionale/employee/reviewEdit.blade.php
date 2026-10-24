@vite(['resources/css/partials/dashboard.css', 'resources/js/partials/dashboard.js'])
@vite(['resources/css/partials/edit.css', 'resources/js/partials/edit.js'])

@extends('partials.dashboardEmployee', [
        'button1Title' => 'Recensioni',
        'button1Number' => '',
        'button1Url' => '#',
        'button2Title' => 'Clienti',
        'button2Number' => '',
        'button2Url' => '#',
        'button3Title' => 'Appuntamenti',
        'button3Number' => '',
        'button3Url' => '#',
        'pageTitle' => 'Recensione Page'
    ])

@section('content')
    <div class="modifica_container">
        <!-- tasto per tornare indietro -->
        <div class="back-button-container">
            <a href="/employee/dashboard/reviews" class="btn btn-secondary">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M17 6h-6a1 1 0 0 0-.78.375l-4 5a1 1 0 0 0 0 1.25l4 5A1 1 0 0 0 11 18h6l.112-.006a1 1 0 0 0 .669-1.619L14.28 12l3.5-4.375A1 1 0 0 0 17 6"/></svg>
            </a>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route('reviews.update2', $review->review_id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="rating">Voto (da 1 a 5):</label>
                <input type="number" name="rating" id="rating" class="form-control" min="1" max="5" value="{{ $review->rating }}" required>
            </div>
            <div class="form-group">
                <label for="description">Descrizione:</label>
                <textarea name="description" id="description" class="form-control">{{ $review->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="appointment_id">ID Appuntamento:</label>
                <select name="appointment_id" id="appointment_id" class="form-control" required>
                    <option value="" disabled>Seleziona un appuntamento</option>
                    @foreach($appointments as $appointment)
                        <option value="{{ $appointment->appointment_id }}" {{ $review->appointment_id == $appointment->appointment_id ? 'selected' : '' }}>
                            {{ $appointment->appointment_id }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn_aggiorna">Aggiorna</button>
        </form>
    </div>
@endsection
