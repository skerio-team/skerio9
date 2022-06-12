<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StadiumSection extends Model
{
    use HasFactory;

    protected $table = 'stadium_sections';
    protected $fillable = [
        'stadium_id',
        'name',
        'price',
        'capacity',
        'image',
    ];

    public function stadiums(): BelongsTo
    {
        return $this->belongsTo(Stadium::class, 'stadium_id');
    }
}
