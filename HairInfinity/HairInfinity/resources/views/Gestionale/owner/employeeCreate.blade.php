@vite(['resources/css/partials/dashboard.css', 'resources/js/partials/dashboard.js'])

@extends('partials.dashboardOwner', [
        'button1Title' => 'Dipendenti',
        'button1Number' => '',
        'button1Url' => '#',
        'button2Title' => 'Maschi',
        'button2Number' => '',
        'button2Url' => '#',
        'button3Title' => 'Femmine',
        'button3Number' => '',
        'button3Url' => '#',
        'pageTitle' => 'Dipendenti Page'
    ])

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container_create">
        <!-- tasto per tornare indietro -->
        <div class="back-button-container">
            <a href="/owner/dashboard/employees" class="btn btn-secondary">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M17 6h-6a1 1 0 0 0-.78.375l-4 5a1 1 0 0 0 0 1.25l4 5A1 1 0 0 0 11 18h6l.112-.006a1 1 0 0 0 .669-1.619L14.28 12l3.5-4.375A1 1 0 0 0 17 6"/></svg>
            </a>
        </div>

        <form method="POST" action="{{ route('employees.store') }}">
            @csrf
            <div class="form-group">
                <label for="name">Nome:</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="lastName">Cognome:</label>
                <input type="text" name="lastName" id="lastName" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" class="form-control" required>
            </div>
             <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="tax_code">Codice Fiscale:</label>
                <input type="text" name="tax_code" id="tax_code" class="form-control" required>
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
                <label for="salary">Salario:</label>
                <input type="number" step="0.01" name="salary" id="salary" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="date_of_hire">Data di Assunzione:</label>
                <input type="date" name="date_of_hire" id="date_of_hire" class="form-control" required>
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
      const addPhoneButton = document.querySelector('.btn_phone');

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
