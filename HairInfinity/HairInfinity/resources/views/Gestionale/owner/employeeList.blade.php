@vite(['resources/css/partials/dashboard.css', 'resources/js/partials/dashboard.js'])

@extends('partials.dashboardOwner', [
        'button1Title' => 'Dipendenti',
        'button1Number' => $totalEmployees,
        'button1Url' => '#',
        'button2Title' => 'Maschi',
        'button2Number' => $totalMales,
        'button2Url' => '#',
        'button3Title' => 'Femmine',
        'button3Number' => $totalFemales,
        'button3Url' => '#',
        'pageTitle' => 'Dipendenti Page'
    ])

@section('content')
    <div class="tabella_container">
        <div class="element_container">
            <div class="barra_cerca">
                <form method="GET" action="{{ route('employeesList.index') }}" class="search_form">
                    <div class="cerca_data">
                        <input type="text" name="query" value="{{ $query ?? '' }}" placeholder="Cerca"/>
                        <button type="submit">Cerca</button>
                    </div>
                </form>
                <button onclick="window.location.href='{{ route('employees.create') }}'" class="btn_aggiungi">Aggiungi Dipendente</button>
            </div>
            <table class="element_table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Cognome</th>
                    <th>Email</th>
                    <th>Codice Fiscale</th>
                    <th>Età</th>
                    <th>Data di nascita</th>
                    <th>Sesso</th>
                    <th>Salario</th>
                    <th>Data di Assunzione</th>
                     <th>Numero di Telefono</th>
                    <th>Azioni</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($employees as $employee)
                    <tr>
                        <td>{{ $employee->employee_id }}</td>
                        <td>{{ $employee->name }}</td>
                        <td>{{ $employee->lastName }}</td>
                        <td>{{ $employee->email }}</td>
                        <td>{{ $employee->tax_code }}</td>
                        <td>{{ $employee->age }}</td>
                        <td>{{ $employee->date_of_birth }}</td>
                        <td>{{ $employee->gender }}</td>
                        <td>{{ $employee->salary }}</td>
                        <td>{{ $employee->date_of_hire }}</td>
                         <td>
                             @foreach($employee->phones as $phone)
                                    {{ $phone->number }} <br>
                             @endforeach
                        </td>
                        <td>
                            <div class="action-buttons">
                                <a class="btn_modifica" href="{{ route('employees.edit', $employee->employee_id) }}">Modifica</a>
                                <form method="POST" action="{{ route('employees.destroy', $employee->employee_id) }}" style="display:inline-block;">
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
                        <td colspan="5">Nessun dipendente trovato.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
            {{ $employees->links() }}
        </div>
@endsection
