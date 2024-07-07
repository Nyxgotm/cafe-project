<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Cart_Item extends Model
{
    use HasFactory;

    protected $table='cart_items';

    protected $keyType = 'string';

    public $incrementing = false;

    protected $primaryKey = 'cart_item_id';

    protected $fillable = [
        'quantity'
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->cart_item_id = Str::uuid()->toString();
        });
    }
    public function carts(){
        return $this->hasMany(Cart::class, 'cart_item_id', 'cart_item_id');
    }
}
