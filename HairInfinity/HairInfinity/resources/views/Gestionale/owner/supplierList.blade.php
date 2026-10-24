@vite(['resources/css/partials/dashboard.css', 'resources/js/partials/dashboard.js'])

@extends('partials.dashboardOwner', [
        'button1Title' => 'Fornitori',
        'button1Number' => $totalSuppliers,
        'button1Url' => '#',
        'button2Title' => 'Attivi',
        'button2Number' => $totalActive,
        'button2Url' => '#',
        'button3Title' => 'Sospesi',
        'button3Number' => $totalSuspended,
        'button3Url' => '#',
        'pageTitle' => 'Fornitore Page'
    ])

@section('content')
    <div class="tabella_container">
        <div class="element_container">
            <div class="barra_cerca">
                 <form method="GET" action="{{ route('supplierList.index') }}" class="search_form">
                     <div class="cerca_data">
                         <input type="text" name="query" value="{{ $query ?? '' }}" placeholder="Cerca"/>
                         <button type="submit">Cerca</button>
                     </div>
                </form>
                <button onclick="window.location.href='{{ route('suppliers.create') }}'" class="btn_aggiungi">Aggiungi Fornitore</button>
            </div>
            <table class="element_table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Telefono</th>
                         <th>Indirizzo</th>
                        <th>Stato Contratto</th>
                        <th>Valutazione</th>
                        <th>Azioni</th>
                    </tr>
                </thead>
                <tbody>
                @forelse ($suppliers as $supplier)
                    <tr>
                        <td>{{ $supplier->supplier_id }}</td>
                        <td>{{ $supplier->name }}</td>
                        <td>{{ $supplier->email }}</td>
                        <td>{{ $supplier->phone }}</td>
                        <td>{{ $supplier->address }}</td>
                         <td>{{ $supplier->contract_status }}</td>
                        <td>{{ $supplier->rating }}</td>
                        <td>
                            <div class="action-buttons">
                                <a class="btn_modifica" href="{{ route('suppliers.edit', $supplier->supplier_id) }}">Modifica</a>
                                <form action="{{ route('suppliers.destroy', $supplier->supplier_id) }}" method="POST" style="display:inline;">
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
                            <td colspan="5">Nessun fornitore trovato.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
           {{ $suppliers->links() }}
        </div>
    </div>
@endsection
