<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $table='products';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $primaryKey = 'product_id';

    protected $fillable =[
        'product_id',
        'category_id',
        'title',
        'price',
        'image',
        'description',

    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {

            $model->product_id = Str::uuid()->toString();

        });
    }

    public function category() {

        return $this->belongsTo(Category::class, 'category_id', 'category_id');

    }
}
