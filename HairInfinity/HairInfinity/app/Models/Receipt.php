<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Receipt extends Model
{
    use HasFactory;

    // Specifica il nome della chiave primaria
    protected $primaryKey = 'receipt_id';

    // Specifica che la chiave primaria è auto-incrementante (se lo è)
    public $incrementing = true;

    // Specifica il tipo della chiave primaria (se non è un intero)
    protected $keyType = 'int';

    protected $fillable = [
        'issue_date',
        'total',
        'payment_method_id',  // Assicurati che questo sia incluso
    ];

    public function payment_method()
    {
        return $this->belongsTo(Payment_method::class, 'payment_method_id', 'payment_method_id');
    }

    public function appointment()
    {
        return $this->hasOne(Appointment::class, 'receipt_id', 'receipt_id');
    }
}