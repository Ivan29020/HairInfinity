<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Carbon\Carbon;

class Employee extends Authenticatable
{
    use HasFactory;
    protected $primaryKey = 'employee_id';
    public $incrementing = true;
    protected $keyType = 'int';
    protected $fillable = [
        'name',
        'lastName',
        'email',
        'username',
        'password',
        'tax_code',
        'date_of_birth',
        'gender',
        'salary',
        'hiring_date',
        'age'
    ];

    public function phones()
    {
        return $this->hasMany(Phone::class, 'employee_id', 'employee_id');
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