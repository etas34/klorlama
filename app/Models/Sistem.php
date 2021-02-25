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
        'telefon',
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
