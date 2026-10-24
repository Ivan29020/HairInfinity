<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;

class Customer extends Model
{
    use HasFactory;

    protected $primaryKey = 'customer_id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'name',
        'lastname',
        'date_of_birth',
        'age',
        'gender'
    ];

    public function phones()
    {
        return $this->hasMany(Phone::class, 'customer_id', 'customer_id');
    }
        // Metodo per calcolare l'età dalla data di nascita
       public function getAgeAttribute()
       {
            if ($this->date_of_birth) {
             return Carbon::parse($this->date_of_birth)->age;
             }
            return null;
      }

      public function setAgeAttribute($value)
        {
        //impedisco che l'age venga inserita, verrà calcolata automaticamente in fase di salvataggio
        }
}