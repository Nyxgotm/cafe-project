<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    protected $table='categories';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $primaryKey = 'category_id';

    protected $fillable = [
        'category_id',
        'title',
        'image'
    ];

    public static function boot() {
        parent::boot();

        static::creating(function ($model) {
            $model->category_id = Str::uuid()->toString();
        });
    }
    public function products() {
        return $this->hasMany(Product::class, 'category_id', 'category_id');
    }
}
