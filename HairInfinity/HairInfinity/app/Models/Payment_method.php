<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment_method extends Model
{
    //
    use HasFactory;
    protected $primaryKey = 'payment_method_id';
    // Specifica che la chiave primaria è auto-incrementante (se lo è)
    public $incrementing = true; // Imposta su false se owner_id non è auto-incrementante

    // Specifica il tipo della chiave primaria (se non è un intero)
    protected $keyType = 'int'; // Imposta su 'string' se owner_id è una stringa
    protected $fillable = [
        'type',
        'description',
        'fees',
    ];
}