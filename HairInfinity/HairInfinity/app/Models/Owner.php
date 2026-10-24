<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Owner extends Authenticatable
{
    use HasFactory, Notifiable;

    // Specifica il nome della chiave primaria
    protected $primaryKey = 'owner_id';

    // Specifica che la chiave primaria è auto-incrementante (se lo è)
    public $incrementing = true; // Imposta su false se owner_id non è auto-incrementante

    // Specifica il tipo della chiave primaria (se non è un intero)
    protected $keyType = 'int'; // Imposta su 'string' se owner_id è una stringa

    // Campi che possono essere assegnati in massa
    protected $fillable = [
        'email',
        'name',
        'last_name',
        'username',
        'password',
        'date_of_birth',
        'tax_code', // Corretto: rimuovi lo spazio nel nome del campo
        'age',
        'gender',
        'remember_token',
    ];

    // Campi nascosti quando il modello viene convertito in array/JSON
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Casting dei campi (opzionale, ma utile)
    protected $casts = [
        'date_of_birth' => 'date',
    ];
}
