@vite(['resources/css/partials/dashboard.css', 'resources/js/partials/dashboard.js'])

@extends('partials.dashboardOwner', [
        'button1Title' => 'Fornitori',
        'button1Number' => '',
        'button1Url' => '#',
        'button2Title' => 'Attivi',
        'button2Number' => '',
        'button2Url' => '#',
        'button3Title' => 'Sospesi',
        'button3Number' => '',
        'button3Url' => '#',
        'pageTitle' => 'Fornitore Page'
    ])

@section('content')
    <div class="container_create">
        <!-- tasto per tornare indietro -->
        <div class="back-button-container">
            <a href="/owner/dashboard/receipts" class="btn btn-secondary">
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
        <form method="POST" action="{{ route('suppliers.store') }}">
            @csrf
            <div class="form-group">
                <label for="name">Nome:</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="phone">Telefono:</label>
                <input type="text" name="phone" id="phone" class="form-control">
            </div>
            <div class="form-group">
                 <label for="address">Indirizzo:</label>
                 <textarea name="address" id="address" class="form-control"></textarea>
            </div>
             <div class="form-group">
                  <label for="contract_status">Stato Contratto:</label>
                 <select name="contract_status" id="contract_status" class="form-control" required>
                    <option value="Active">Attivo</option>
                    <option value="Suspended">Sospeso</option>
                 </select>
            </div>
             <div class="form-group">
                <label for="rating">Valutazione:</label>
                <input type="number" step="0.1" name="rating" id="rating" class="form-control" required>
            </div>
             <button type="submit" class="btn_aggiungi">Aggiungi</button>
        </form>
    </div>
@endsection
