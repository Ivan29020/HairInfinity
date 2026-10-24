@vite(['resources/css/partials/dashboard.css', 'resources/js/partials/dashboard.js'])
@vite(['resources/css/partials/edit.css', 'resources/js/partials/edit.js'])

@extends('partials.dashboardOwner', [
        'button1Title' => 'Appuntamenti',
        'button1Number' => '',
        'button1Url' => '#',
        'button2Title' => 'Recensioni',
        'button2Number' => '',
        'button2Url' => '#',
        'button3Title' => 'Scontrini',
        'button3Number' => '',
        'button3Url' => '#',
        'pageTitle' => 'Appuntamenti Page'
    ])

@section('content')
    <div class="modifica_container">
        <!-- tasto per tornare indietro -->
        <div class="back-button-container">
            <a href="/owner/dashboard/appointments" class="btn btn-secondary">
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
        <form method="POST" action="{{ route('appointments.update', $appointment->appointment_id) }}">
            @csrf
            @method('PUT')
             <div class="form-group">
                    <label for="date">Data:</label>
                    <input type="date" name="date" id="date" class="form-control" value="{{ $appointment->date }}" required>
                </div>
                <div class="form-group">
                    <label for="time">Ora:</label>
                    <input type="time" name="time" id="time" class="form-control" value="{{ \Carbon\Carbon::parse($appointment->time)->format('H:i') }}" required>
                </div>
                <div class="form-group">
                     <label for="description">Descrizione:</label>
                     <textarea name="description" id="description" class="form-control">{{ $appointment->description }}</textarea>
                </div>
           <div class="form-group">
                <label for="customer_id">Cliente:</label>
                <select name="customer_id" id="customer_id" class="form-control" required>
                         <option value="" disabled >Seleziona un cliente</option>
                    @foreach($customers as $customer)
                        <option value="{{ $customer->customer_id }}" {{ $appointment->customer_id == $customer->customer_id ? 'selected' : '' }}>{{ $customer->name }} {{ $customer->lastname }}</option>
                    @endforeach
                  </select>
           </div>
           <div class="form-group">
                <label for="employee_id">Dipendente:</label>
                <select name="employee_id" id="employee_id" class="form-control" required>
                         <option value="" disabled >Seleziona un dipendente</option>
                    @foreach($employees as $employee)
                        <option value="{{ $employee->employee_id }}"  {{ $appointment->employee_id == $employee->employee_id ? 'selected' : '' }}>{{ $employee->name }} {{ $employee->lastname }}</option>
                    @endforeach
                  </select>
           </div>
           <div class="form-group">
                <label for="hall_id">Sala:</label>
                 <select name="hall_id" id="hall_id" class="form-control" required>
                         <option value="" disabled>Seleziona una sala</option>
                    @foreach($halls as $hall)
                        <option value="{{ $hall->hall_id }}"  {{ $appointment->hall_id == $hall->hall_id ? 'selected' : '' }}>{{ $hall->name }}</option>
                    @endforeach
                  </select>
           </div>
            <button type="submit" class="btn_aggiorna">Aggiorna</button>
        </form>
    </div>
@endsection
