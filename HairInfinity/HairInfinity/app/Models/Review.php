<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $primaryKey = 'review_id';
    public $incrementing = true;
    protected $keyType = 'int';
    protected $fillable = [
        'rating',
        'description',
        'appointment_id',
    ];
    public function appointment(){
      return  $this->belongsTo(Appointment::class,'appointment_id', 'appointment_id');
    }

}