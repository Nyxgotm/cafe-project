<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Article extends Model
{
    use HasFactory;

    protected $table ='articles';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $primaryKey = 'product_id';

    protected $fillable = [
        'article_id',
        'title',
        'description',
        'image',
        'veiw'
    ];
    public static function boot()
    {
        parent::boot();

        static::creating(function ($model){

            $model->article_id =Str::uuid()->toString();
        });
    }
}
