<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table='users';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $primaryKey = 'user_id';
    protected $fillable = [
        'name', 'email', 'password',
    ];
    public static function boot()
    {
        parent::boot();

        static::creating(function ($model){
            $model->user_id =Str::uuid()->toString();
        });
    }
    public function cart()
    {
            return $this->hasOne(Cart::class,'user_id','user_id');
    }


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
