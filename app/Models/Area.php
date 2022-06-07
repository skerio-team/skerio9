<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Area extends Model
{
    use HasFactory;

    protected $table = 'areas';
    protected $fillable = [
        'region_id',
        'name',
    ];

    public function regions(): BelongsTo
    {
        return $this->belongsTo(Region::class, 'region_id');
    }

    public function sportComplexes(): HasMany
    {
        return $this->hasMany(SportComplex::class);
    }
}
