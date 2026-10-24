@vite(['resources/css/partials/dashboard.css', 'resources/js/partials/dashboard.js'])

@extends('partials.dashboardOwner', [
        'button1Title' => 'Scontrini',
        'button1Number' => $totalReceipts,
        'button1Url' => '#',
        'button2Title' => 'Appuntamenti',
        'button2Number' => $totalAppointments,
        'button2Url' => '#',
        'button3Title' => 'Totale',
        'button3Number' => $totalCost . ' €',
        'button3Url' => '#',
        'pageTitle' => 'Scontrino Page'
    ])

@section('content')
    <div class="tabella_container">
        <div class="element_container">
            <div class="barra_cerca">
                <form method="GET" action="{{ route('receiptList.index') }}" class="search_form">
                    <div class="cerca_data">
                        <input type="text" name="query" value="{{ $query ?? '' }}" placeholder="Cerca"/>
                        <button type="submit">Cerca</button>
                    </div>
                </form>
            </div>
            <table class="element_table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Data Immissione</th>
                    <th>Totale</th>
                    <th>Metodo di Pagamento</th>
                    <th>ID Appuntamento</th>
                    <th>Azioni</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($receipts as $receipt)
                    <tr>
                        <td>{{ $receipt->receipt_id }}</td>
                        <td>{{ $receipt->issue_date }}</td>
                        <td>{{ $receipt->total }}</td>
                        <td>{{ $receipt->payment_method->type }}</td>
                        <td>
                          @if($receipt->appointment)
                            {{ $receipt->appointment->appointment_id }}
                           @else
                            -
                          @endif
                         </td>
                        <td>
                            <div class="action-buttons">
                                <a class="btn_modifica" href="{{ route('receipts.edit', $receipt->receipt_id) }}">Modifica</a>
                                <form action="{{ route('receipts.destroy', $receipt->receipt_id) }}" method="POST" style="display:inline;">
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
                        <td colspan="6">Nessuno scontrino trovato.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
            {{ $receipts->links() }}
        </div>
    </div>
@endsection
