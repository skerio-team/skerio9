<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Region extends Model
{
    use HasFactory;

    protected $table = 'regions';
    protected $fillable = [
        'country_id',
        'name',
    ];

    public function countries(): BelongsTo
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function areas(): HasMany
    {
        return $this->hasMany(Area::class);
    }
}
