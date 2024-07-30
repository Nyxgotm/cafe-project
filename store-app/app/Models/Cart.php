<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Cart extends Model
{
    use HasFactory;
    protected $table='carts';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $primaryKey = 'cart_id';

    protected $fillable =[
        'cart_id', 'user_id'
    ];

    public static function boot() {
        parent::boot();

        static::creating(function ($model) {
            $model->cart_id = Str::uuid()->toString();
        });
    }

}
