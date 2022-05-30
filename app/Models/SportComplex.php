<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SportComplex extends Model
{
    use HasFactory;

    protected $table = 'sport_complexes';

    public function areas(): HasMany
    {
        return $this->hasMany(Area::class);
    }
}
