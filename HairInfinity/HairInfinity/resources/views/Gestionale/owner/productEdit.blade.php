@vite(['resources/css/partials/dashboard.css', 'resources/js/partials/dashboard.js'])
@vite(['resources/css/partials/edit.css', 'resources/js/partials/edit.js'])

@extends('partials.dashboardOwner', [
        'button1Title' => 'Prodotti',
        'button1Number' => '',
        'button1Url' => '#',
        'button2Title' => 'Costo totale',
        'button2Number' => '',
        'button2Url' => '#',
        'button3Title' => 'Appuntamenti',
        'button3Number' => '',
        'button3Url' => '#',
        'pageTitle' => 'Prodotti Page'
    ])

@section('content')
    <div class="modifica_container">
        <!-- tasto per tornare indietro -->
        <div class="back-button-container">
            <a href="/owner/dashboard/products" class="btn btn-secondary">
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
        <form method="POST" action="{{ route('products.update', $product->product_id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nome:</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $product->name }}" required>
            </div>
            <div class="form-group">
                <label for="price">Prezzo:</label>
                <input type="number" name="price" id="price" class="form-control" value="{{ $product->price }}" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="description">Descrizione:</label>
                <textarea name="description" id="description" class="form-control">{{ $product->description }}</textarea>
            </div>
            <div class="form-group">
                    <label for="category_id">Categoria:</label>
                   <select name="category_id" id="category_id" class="form-control" required>
                         <option value="" disabled>Seleziona una categoria</option>
                          @foreach($categories as $category)
                               <option value="{{ $category->category_id }}" {{ $product->category_id == $category->category_id ? 'selected' : '' }}>
                                     {{ $category->name }}
                                </option>
                            @endforeach
                    </select>
           </div>
            <button type="submit" class="btn_aggiorna">Aggiorna</button>
        </form>
    </div>
@endsection
