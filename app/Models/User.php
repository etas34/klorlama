<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the phone associated with the user.
     */
    public function il()
    {
        return $this->belongsTo(Il::class);
    }

    /**
     * Get the phone associated with the user.
     */
    public function ilce()
    {

        return $this->belongsTo(Ilce::class);
    }

    /**
     * Get the phone associated with the user.
     */
    public function sistem()
    {
        return $this->belongsTo(Sistem::class);
    }

    public function getYetki()
    {
        if ($this->il_id == "*")
            return Sistem::all();

        if ($this->ilce_id == "*")
            return Sistem::where('il_id',$this->il_id)->get();

        if ($this->sistem_id == "*")
            return Sistem::where('il_id',$this->il_id)->where('ilce_id',$this->ilce_id)->get();


        return Sistem::where('il_id',$this->il_id)->where('ilce_id',$this->ilce_id)->where('id',$this->sistem_id)->get();
    }


}
