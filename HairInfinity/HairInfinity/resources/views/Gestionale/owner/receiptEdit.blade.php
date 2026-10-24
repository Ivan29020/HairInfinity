@vite(['resources/css/partials/dashboard.css', 'resources/js/partials/dashboard.js'])
@vite(['resources/css/partials/edit.css', 'resources/js/partials/edit.js'])

@extends('partials.dashboardOwner', [
        'button1Title' => 'Scontrini',
        'button1Number' => '',
        'button1Url' => '#',
        'button2Title' => 'Appuntamenti',
        'button2Number' => '',
        'button2Url' => '#',
        'button3Title' => 'Totale',
        'button3Number' => '',
        'button3Url' => '#',
        'pageTitle' => 'Scontrino Page'
    ])

@section('content')
    <div class="modifica_container">
        <!-- tasto per tornare indietro -->
        <div class="back-button-container">
            <a href="/owner/dashboard/suppliers" class="btn btn-secondary">
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
        <form action="{{ route('receipts.update', $receipt->receipt_id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="issue_date">Data Immissione:</label>
                <input type="date" name="issue_date" value="{{ $receipt->issue_date }}" required>
            </div>
            <div class="form-group">
                <label for="total">Totale:</label>
                <input type="number" step="0.01" name="total" value="{{ $receipt->total }}" required>
            </div>
            <div class="form-group">
                <label for="payment_method_id">Metodo di Pagamento:</label>
                <select name="payment_method_id" required>
                    @foreach($paymentMethods as $method)
                        <option value="{{ $method->payment_method_id }}" {{ $receipt->payment_method_id == $method->payment_method_id ? 'selected' : '' }}>{{ $method->type }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn_aggiorna">Aggiorna</button>
        </form>
    </div>
@endsection
