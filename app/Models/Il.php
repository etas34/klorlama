<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Il extends Model
{
    use HasFactory;

    /**
     * Get the İlçes for the İl .
     */
    public function ilces()
    {
        return $this->hasMany(Ilce::class);
    }
}
