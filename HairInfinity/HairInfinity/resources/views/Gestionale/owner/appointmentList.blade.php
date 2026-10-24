@vite(['resources/css/partials/dashboard.css', 'resources/js/partials/dashboard.js'])

@extends('partials.dashboardOwner', [
        'button1Title' => 'Appuntamenti',
        'button1Number' => $totalAppointments,
        'button1Url' => '#',
        'button2Title' => 'Recensioni',
        'button2Number' => $totalReviews,
        'button2Url' => '#',
        'button3Title' => 'Scontrini',
        'button3Number' => $totalReceipts,
        'button3Url' => '#',
        'pageTitle' => 'Appuntamenti Page'
    ])

@section('content')
    <div class="tabella_container">
        <!-- Riga iniziale -->
        <div class="barra_cerca">
            <form method="GET" action="{{ route('appointmentList.index') }}" class="search_form" id="appointmentFilterForm">
                <div class="cerca_data">
                    <input type="date" name="date" value="{{ $selectedDate ?? '' }}" class="data" id="datePicker" placeholder="dd/mm/yyyy"/>
                    <input type="text" name="query" value="{{ $query ?? '' }}" class="cerca" placeholder="Cerca"/>
                    <button type="submit">Cerca</button>
                </div>
            </form>
            <div>
                <button onclick="window.location.href='{{ route('appointments.create') }}'" class="btn_aggiungi">Aggiungi Appuntamento</button>
                <form action="{{ route('appointmentList.index') }}" method="GET" style="display:inline;">
                    <input type="hidden" name="show_all" value="true">
                    <button type="submit" class="btn_cerca_tutto">Tutti gli appuntamenti</button>
                </form>
            </div>
        </div>
        <table class="element_table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Data</th>
                <th>Ora</th>
                <th>Descrizione</th>
                    <th>Cliente</th>
                    <th>Dipendente</th>
                    <th>Sala</th>
                    <th>ID Scontrino</th>
                    <th>Azioni</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($appointments as $appointment)
                    <tr>
                        <td>{{ $appointment->appointment_id }}</td>
                        <td>{{ $appointment->date }}</td>
                        <td>{{ $appointment->time }}</td>
                        <td>{{ $appointment->description }}</td>
                        <td>{{ $appointment->customer->name }} {{ $appointment->customer->lastname }}</td>
                        <td>{{ $appointment->employee->name }} {{ $appointment->employee->lastname }}</td>
                        <td>{{ $appointment->hall->name }}</td>
                        <td>{{ $appointment->receipt_id }}</td>
                         <td>
                             <div class="action-buttons">
                                <a class="btn_modifica" href="{{ route('appointments.edit', $appointment->appointment_id) }}">Modifica</a>
                                <form action="{{ route('appointments.destroy', $appointment->appointment_id) }}" method="POST" style="display:inline;">
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
                        <td colspan="9">Nessun appuntamento trovato.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
            {{ $appointments->appends(['query' => request('query'), 'date' => request('date'), 'show_all' => request('show_all')])->links() }}
        </div>
    <script>
        document.getElementById('datePicker').addEventListener('change', function() {
            document.getElementById('appointmentFilterForm').submit();
        });
    </script>
@endsection
