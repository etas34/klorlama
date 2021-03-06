<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sistem extends Model
{
    use HasFactory;

    protected $fillable = [
        'ilce_id',
        'il_id',
        'ad',
        'klorlama_tel',
        'motor_tel',
        'klor_olcum_tel',
        'ust_limit',
        'alt_limit',
    ];

    public function Il()
    {
        return $this->belongsTo(Il::class);
    }

    public function Ilce()
    {
        return $this->belongsTo(Ilce::class);
    }
}
