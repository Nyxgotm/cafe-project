<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Cart extends Model
{
    use HasFactory;
    protected $table='products';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $primaryKey = 'cart_id';

    public static function boot() {
        parent::boot();

        static::creating(function ($model) {
            $model->cart_id = Str::uuid()->toString();
        });
    }

    public function user() {
        return $this->hasOne(User::class, 'user_id', 'user_id');
    }
}
