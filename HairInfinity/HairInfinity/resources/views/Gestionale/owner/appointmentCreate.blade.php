@vite(['resources/css/partials/dashboard.css', 'resources/js/partials/dashboard.js'])

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
    <div class="container_create">
        <!-- tasto indietro -->
        <div class="back-button-container">
            <a href="/owner/dashboard/appointments" class="btn btn-secondary">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M17 6h-6a1 1 0 0 0-.78.375l-4 5a1 1 0 0 0 0 1.25l4 5A1 1 0 0 0 11 18h6l.112-.006a1 1 0 0 0 .669-1.619L14.28 12l3.5-4.375A1 1 0 0 0 17 6"/></svg>
            </a>
        </div>

        <!-- Alert di errore -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Modulo -->
        <form method="POST" action="{{ route('appointments.store') }}">
            @csrf
             <div class="form-group">
                    <label for="date">Data:</label>
                    <input type="date" name="date" id="date" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="time">Ora:</label>
                     <input type="time" name="time" id="time" class="form-control" required>
                </div>
             <div class="form-group">
                <label for="description">Descrizione:</label>
                 <textarea name="description" id="description" class="form-control"></textarea>
             </div>
           <div class="form-group">
                <label for="customer_id">Cliente:</label>
                <select name="customer_id" id="customer_id" class="form-control" required>
                         <option value="" disabled selected>Seleziona un cliente</option>
                    @foreach($customers as $customer)
                        <option value="{{ $customer->customer_id }}">{{ $customer->name }} {{ $customer->lastname }}</option>
                    @endforeach
                  </select>
           </div>
           <div class="form-group">
                <label for="employee_id">Dipendente:</label>
                <select name="employee_id" id="employee_id" class="form-control" required>
                         <option value="" disabled selected>Seleziona un dipendente</option>
                    @foreach($employees as $employee)
                        <option value="{{ $employee->employee_id }}">{{ $employee->name }} {{ $employee->lastname }}</option>
                    @endforeach
                  </select>
           </div>
            <div class="form-group">
                <label for="hall_id">Sala:</label>
                 <select name="hall_id" id="hall_id" class="form-control" required>
                         <option value="" disabled selected>Seleziona una sala</option>
                    @foreach($halls as $hall)
                        <option value="{{ $hall->hall_id }}">{{ $hall->name }}</option>
                    @endforeach
                  </select>
            </div>
             <div class="form-group">
                    <label for="total">Totale:</label>
                    <input type="number" name="total" id="total" class="form-control" step="0.01" required>
             </div>
           <div class="form-group">
                    <label for="payment_method_id">Metodo di Pagamento:</label>
                      <select name="payment_method_id" id="payment_method_id" class="form-control" required>
                         <option value="" disabled selected>Seleziona un metodo di pagamento</option>
                            @foreach(\App\Models\Payment_method::all() as $paymentMethod)
                                 <option value="{{ $paymentMethod->payment_method_id }}">{{ $paymentMethod->type }}</option>
                            @endforeach
                   </select>
            </div>
            <button type="submit" class="btn_aggiungi">Aggiungi</button>
        </form>
    </div>
@endsection
