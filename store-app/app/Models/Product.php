<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;

    protected $table='products';

    protected $primaryKey = 'product_id';
    protected $fillable =[
        'category_id',
        'title',
        'price',
        'image',
        'description',

    ];
}
