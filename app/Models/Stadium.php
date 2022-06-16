<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Stadium extends Model
{
    use HasFactory;

    protected $table = 'stadiums';
    protected $fillable = ['name'];

    public function stadiumSections(): HasMany
    {
        return $this->hasMany(StadiumSection::class);
    }
}
