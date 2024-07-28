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
        'product_id',
        'quantity',
        'cart_id'
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->cart_item_id = Str::uuid()->toString();
        });
    }
    public function product(){
       return $this->belongsTo(Product::class, 'product_id', 'product_id');
    }
}
