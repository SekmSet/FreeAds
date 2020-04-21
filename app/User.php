<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','color_id','theme_id','city'
    ];

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

    public function themes(){
        return $this->belongsTo(Theme::class,'theme_id');

    }

    public function colors(){
        return $this->belongsTo(Color::class,'color_id');
    }

    public function sends()
    {
        return $this->hasMany(Message::class);
    }

    public function received()
    {
        return $this->hasMany(Message::class);
    }
}
