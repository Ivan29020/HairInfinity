@vite(['resources/css/partials/dashboard.css', 'resources/js/partials/dashboard.js'])

@extends('partials.dashboardEmployee', [
        'button1Title' => 'Clienti',
        'button1Number' => $totalCustomers,
        'button1Url' => '#',
        'button2Title' => 'Maschi',
        'button2Number' => $totalMales,
        'button2Url' => '#',
        'button3Title' => 'Femmine',
        'button3Number' => $totalFemales,
        'button3Url' => '#',
        'pageTitle' => 'Clienti Page'
    ])

@section('content')
    <div class="tabella_container">
        <div class="element_container">
            <div class="barra_cerca">
                <form method="GET" action="{{ route('customerList.index2') }}" class="search_form">
                    <div class="cerca_data">
                        <input type="text" name="query" value="{{ $query ?? '' }}" placeholder="Cerca"/>
                        <button type="submit">Cerca</button>
                    </div>
                </form>
                <div>
                    <button onclick="window.location.href='{{ route('customers.create2') }}'" class="btn_aggiungi">Aggiungi Cliente</button>
                </div>
            </div>
            <table class="element_table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Cognome</th>
                    <th>Data di Nascita</th>
                    <th>Età</th>
                    <th>Sesso</th>
                    <th>Numero di Telefono</th>
                    <th>Azioni</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($customers as $customer)
                    <tr>
                        <td>{{ $customer->customer_id }}</td>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->lastname }}</td>
                        <td>{{ $customer->date_of_birth }}</td>
                        <td>{{ $customer->age }}</td>
                        <td>{{ $customer->gender }}</td>
                        <td>
                            @foreach($customer->phones as $phone)
                                {{ $phone->number }} <br>
                            @endforeach
                        </td>
                        <td>
                            <div class="action-buttons">
                                <a class="btn_modifica" href="{{ route('customers.edit2', $customer->customer_id) }}">Modifica</a>
                                <form action="{{ route('customers.destroy2', $customer->customer_id) }}" method="POST" style="display:inline;">
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
                        <td colspan="5">Nessun cliente trovato.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
            {{ $customers->links() }}
        </div>
    </div>
@endsection
