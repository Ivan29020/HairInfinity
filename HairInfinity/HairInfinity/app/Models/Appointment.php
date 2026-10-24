<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $primaryKey = 'appointment_id';
    public $incrementing = true;
    protected $keyType = 'int';
    protected $fillable = [
        'date',
        'time',
        'description',
        'customer_id',
        'employee_id',
        'hall_id',
        'receipt_id',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'customer_id');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'employee_id');
    }

    public function hall()
    {
        return $this->belongsTo(Hall::class, 'hall_id', 'hall_id');
    }

    public function receipt()
    {
         return $this->belongsTo(Receipt::class, 'receipt_id', 'receipt_id');
    }
    public function review(){
         return $this->hasOne(Review::class, 'appointment_id', 'appointment_id');
    }
}