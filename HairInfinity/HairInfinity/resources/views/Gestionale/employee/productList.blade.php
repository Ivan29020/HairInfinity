@vite(['resources/css/partials/dashboard.css', 'resources/js/partials/dashboard.js'])

@extends('partials.dashboardEmployee', [
        'button1Title' => 'Prodotti',
        'button1Number' => $totalProducts,
        'button1Url' => '#',
        'button2Title' => 'Costo totale',
        'button2Number' => $totalCost.' €',
        'button2Url' => '#',
        'button3Title' => 'Appuntamenti',
        'button3Number' => $totalAppointments,
        'button3Url' => '#',
        'pageTitle' => 'Prodotti Page'
    ])

@section('content')
    <div class="tabella_container">
        <div class="element_container">
            <div class="barra_cerca">
                <form method="GET" action="{{ route('productList.index2') }}" class="search_form">
                    <div class="cerca_data">
                        <input type="text" name="query" value="{{ $query ?? '' }}" placeholder="Cerca"/>
                        <button type="submit">Cerca</button>
                    </div>
                </form>
                <button onclick="window.location.href='{{ route('products.create2') }}'" class="btn_aggiungi">Aggiungi Prodotto</button>
            </div>
            <table class="element_table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Prezzo</th>
                    <th>Descrizione</th>
                    <th>Categoria</th>
                    <th>Azioni</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($products as $product)
                    <tr>
                        <td>{{ $product->product_id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->category->name }}</td>
                        <td>
                            <div class="action-buttons">
                                <a class="btn_modifica" href="{{ route('products.edit2', $product->product_id) }}">Modifica</a>
                                <form action="{{ route('products.destroy2', $product->product_id) }}" method="POST" style="display:inline;">
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
                        <td colspan="5">Nessun prodotto trovato.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
            {{ $products->links() }}
        </div>
    </div>
@endsection
