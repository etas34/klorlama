<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ilce extends Model
{
    use HasFactory;
    /**
     * Get the Il that owns the Ilce.
     */
    public function Il()
    {
        return $this->belongsTo(Il::class);
    }
    public function sistems()
    {
        return $this->hasMany(Sistem::class);
    }

}
