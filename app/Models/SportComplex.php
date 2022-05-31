<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SportComplex extends Model
{
    use HasFactory;

    protected $table = 'sport_complexes';

    public function areas(): BelongsTo
    {
        return $this->belongsTo(Area::class, 'aria_id');
    }
    
    public function sportCategory(): BelongsTo
    {
        return $this->belongsTo(SportCategory::class, 'sport_category_id');
    }
}
