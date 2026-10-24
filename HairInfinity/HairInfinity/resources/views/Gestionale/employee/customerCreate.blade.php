@vite(['resources/css/partials/dashboard.css', 'resources/js/partials/dashboard.js'])

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
    <div class="container_create">
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
        <form method="POST" action="{{ route('customers.store2') }}">
            @csrf
            <div class="form-group">
                <label for="name">Nome:</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="lastname">Cognome:</label>
                <input type="text" name="lastname" id="lastname" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="date_of_birth">Data di Nascita:</label>
                <input type="date" name="date_of_birth" id="date_of_birth" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="gender">Sesso:</label>
                <select name="gender" id="gender" class="form-control" required>
                    <option value="M">Maschio</option>
                    <option value="F">Femmina</option>
                </select>
            </div>
            <div class="form-group">
                <label>Numeri di Telefono:</label>
                <div id="phone-container">
                </div>
                <button type="button" class="btn_phone">Aggiungi Telefono</button>
            </div>
            <button type="submit" class="btn_aggiungi">Aggiungi</button>
        </form>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const phoneContainer = document.getElementById('phone-container');
            const addPhoneButton = document.querySelector('.add-phone');

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
        });
    </script>
@endsection
