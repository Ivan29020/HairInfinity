<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Supplier extends Model
{
    use HasFactory;
     // Specifica il nome della chiave primaria
     protected $primaryKey = 'supplier_id';

     // Specifica che la chiave primaria è auto-incrementante (se lo è)
     public $incrementing = true; // Imposta su false se owner_id non è auto-incrementante
 
     // Specifica il tipo della chiave primaria (se non è un intero)
     protected $keyType = 'int'; // Imposta su 'string' se owner_id è una stringa

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'contract_status',
        'rating',
    ];
}

