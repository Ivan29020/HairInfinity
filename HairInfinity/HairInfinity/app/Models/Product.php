<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $primaryKey = 'product_id';
    public $incrementing = true;
    protected $keyType = 'int';
    protected $fillable = [
        'name',
        'price',
        'description',
        'category_id',
    ];

     public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'category_id');
    }
}