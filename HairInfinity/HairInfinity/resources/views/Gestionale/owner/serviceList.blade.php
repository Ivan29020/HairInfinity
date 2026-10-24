@vite(['resources/css/partials/dashboard.css', 'resources/js/partials/dashboard.js'])

@extends('partials.dashboardOwner', [
        'button1Title' => 'Dipendenti',
        'button1Number' => $totalEmployees,
        'button1Url' => '#',
        'button2Title' => 'Clienti',
        'button2Number' => $totalCustomers,
        'button2Url' => '#',
        'button3Title' => 'Servizi',
        'button3Number' => $totalServices,
        'button3Url' => '#',
        'pageTitle' => 'Servizi Page'
    ])

@section('content')
    <div class="tabella_container">
        <div class="element_container">
            <div class="barra_cerca">
                 <form method="GET" action="{{ route('serviceList.index') }}" class="search_form">
                     <div class="cerca_data">
                         <input type="text" name="query" value="{{ $query ?? '' }}" placeholder="Cerca"/>
                         <button type="submit">Cerca</button>
                     </div>
                 </form>
                <button onclick="window.location.href='{{ route('services.create') }}'" class="btn_aggiungi">Aggiungi Servizio</button>
            </div>
            <table class="element_table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Descrizione</th>
                        <th>Prezzo</th>
                        <th>Azioni</th>
                    </tr>
                </thead>
                <tbody>
                @forelse ($services as $service)
                    <tr>
                        <td>{{ $service->service_id }}</td>
                        <td>{{ $service->name }}</td>
                        <td>{{ $service->description }}</td>
                        <td>{{ $service->price }}</td>
                        <td>
                            <div class="action-buttons">
                                 <a class="btn_modifica" href="{{ route('services.edit', $service->service_id) }}">Modifica</a>
                                 <form action="{{ route('services.destroy', $service->service_id) }}" method="POST" style="display:inline;">
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
                           <td colspan="5">Nessun servizio trovato.</td>
                         </tr>
                @endforelse
                </tbody>
            </table>
            {{ $services->links() }}
        </div>
    </div>
@endsection
