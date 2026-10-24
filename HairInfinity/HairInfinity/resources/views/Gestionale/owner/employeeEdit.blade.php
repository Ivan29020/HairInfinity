@vite(['resources/css/partials/dashboard.css', 'resources/js/partials/dashboard.js'])
@vite(['resources/css/partials/edit.css', 'resources/js/partials/edit.js'])

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
    <div class="modifica_container">
        <!-- tasto per tornare indietro -->
        <div class="back-button-container">
            <a href="/owner/dashboard/employees" class="btn btn-secondary">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M17 6h-6a1 1 0 0 0-.78.375l-4 5a1 1 0 0 0 0 1.25l4 5A1 1 0 0 0 11 18h6l.112-.006a1 1 0 0 0 .669-1.619L14.28 12l3.5-4.375A1 1 0 0 0 17 6"/></svg>
            </a>
        </div>

        <form method="POST" action="{{ route('employees.update', $employee->employee_id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nome:</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $employee->name }}" required>
            </div>
            <div class="form-group">
                <label for="lastName">Cognome:</label>
                <input type="text" name="lastName" id="lastName" class="form-control" value="{{ $employee->lastName }}" required>
            </div>
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" class="form-control" value="{{ $employee->username }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ $employee->email }}" required>
            </div>
            <div class="form-group">
                <label for="tax_code">Codice Fiscale:</label>
                <input type="text" name="tax_code" id="tax_code" class="form-control" value="{{ $employee->tax_code }}" required>
            </div>
            <div class="form-group">
              <label for="age">Età:</label>
              <input type="number" name="age" id="age" class="form-control" value="{{ $employee->age }}" readonly>
           </div>
            <div class="form-group">
                <label for="date_of_birth">Data di Nascita:</label>
                <input type="date" name="date_of_birth" id="date_of_birth" class="form-control" value="{{ $employee->date_of_birth }}" required>
            </div>
            <div class="form-group">
                <label for="gender">Sesso:</label>
                <select name="gender" id="gender" class="form-control" required>
                    <option value="M" {{ $employee->gender == 'M' ? 'selected' : '' }}>Maschio</option>
                    <option value="F" {{ $employee->gender == 'F' ? 'selected' : '' }}>Femmina</option>
                </select>
            </div>
            <div class="form-group">
                <label for="salary">Salario:</label>
                <input type="number" step="0.01" name="salary" id="salary" class="form-control" value="{{ $employee->salary }}" required>
            </div>
            <div class="form-group">
                <label for="date_of_hire">Data di Assunzione:</label>
                <input type="date" name="date_of_hire" id="date_of_hire" class="form-control" value="{{ $employee->date_of_hire }}" required>
            </div>

             <div class="form-group">
                 <label>Numeri di Telefono:</label>
                 @if($employee->phones)
                      @foreach($employee->phones as $phone)
                       <div class="phone-input">
                         <input type="text" name="phones[{{$phone->number}}]" class="form-control" value="{{$phone->number}}">
                         <button type="button" class="remove-phone">Rimuovi</button>
                      </div>
                      @endforeach
                 @endif
                 <div id="phone-container">
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
