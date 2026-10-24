@vite(['resources/css/partials/dashboard.css', 'resources/js/partials/dashboard.js'])
@vite(['resources/css/partials/edit.css', 'resources/js/partials/edit.js'])

@extends('partials.dashboardEmployee', [
        'button1Title' => 'Clienti',
        'button1Number' => '',
        'button1Url' => '#',
        'button2Title' => 'Maschi',
        'button2Number' => '',
        'button2Url' => '#',
        'button3Title' => 'Femmine',
        'button3Number' => '',
        'button3Url' => '#',
        'pageTitle' => 'Clienti Page'
    ])

@section('content')
    <div class="modifica_container">
        <!-- tasto per tornare indietro -->
        <div class="back-button-container">
            <a href="/employee/dashboard/customers" class="btn btn-secondary">
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
        <form method="POST" action="{{ route('customers.update2', $customer->customer_id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nome:</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $customer->name }}" required>
            </div>
            <div class="form-group">
                <label for="lastname">Cognome:</label>
                <input type="text" name="lastname" id="lastname" class="form-control" value="{{ $customer->lastname }}" required>
            </div>
            <div class="form-group">
                <label for="date_of_birth">Data di Nascita:</label>
                <input type="date" name="date_of_birth" id="date_of_birth" class="form-control" value="{{ $customer->date_of_birth }}" required>
            </div>
            <div class="form-group">
                <label for="age">Età:</label>
                <input type="number" name="age" id="age" class="form-control" value="{{ $customer->age }}" readonly>
            </div>
            <div class="form-group">
                <label for="gender">Sesso:</label>
                <select name="gender" id="gender" class="form-control" required>
                    <option value="M" {{ $customer->gender == 'M' ? 'selected' : '' }}>Maschio</option>
                    <option value="F" {{ $customer->gender == 'F' ? 'selected' : '' }}>Femmina</option>
                </select>
            </div>
            <div class="form-group">
                <label>Numeri di Telefono:</label>
                <div id="phone-container">
                    @if($customer->phones)
                        @foreach($customer->phones as $phone)
                            <div class="phone-input">
                                <input type="text" name="phones[{{$phone->number}}]" class="form-control" value="{{$phone->number}}">
                                <button type="button" class="remove-phone">Rimuovi</button>
                            </div>
                        @endforeach
                    @endif
                </div>
                <button type="button" class="btn_phone">Aggiungi Telefono</button>
            </div>
            <button type="submit" class="btn_aggiorna">Aggiorna</button>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const phoneContainer = document.getElementById('phone-container');
            const addPhoneButton = document.querySelector('.btn_phone'); // Corretto selettore

            addPhoneButton.addEventListener('click', function() {
                const phoneInputDiv = document.createElement('div');
                phoneInputDiv.classList.add('phone-input');

                const input = document.createElement('input');
                input.type = 'text';
                input.name = 'phones[]';
                input.classList.add('form-control');

                const removeButton = document.createElement('button');
                removeButton.textContent = 'Rimuovi';
                removeButton.type = 'button';
                removeButton.classList.add('remove-phone');

                removeButton.addEventListener('click', function() {
                    phoneInputDiv.remove();
                });

                phoneInputDiv.appendChild(input);
                phoneInputDiv.appendChild(removeButton);
                phoneContainer.appendChild(phoneInputDiv);
            });

            // Gestione della rimozione dei numeri di telefono esistenti e dinamici
            phoneContainer.addEventListener('click', function(event) {
                if (event.target.classList.contains('remove-phone')) {
                    event.target.closest('.phone-input').remove();
                }
            });
        });
    </script>
@endsection
