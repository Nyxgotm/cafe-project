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
        'user_id'
    ];

    public static function boot() {
        parent::boot();

        static::creating(function ($model) {
            $model->cart_id = Str::uuid()->toString();
        });
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

   // public function cart_item() {
    //    return $this->hasMany(Cart::class, 'cart_id', 'cart_id');
   // }

}
