<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SportComplex extends Model
{
    use HasFactory;

    protected $table = 'sport_complexes';
    protected $fillable = [
        'sport_category_id',
        'area_id',
        'name',
        'image',
        'price',
        'phone',
        'address',
        'location',
        'dress_room',
        'food',
        'bath_room',
        'sit_place',
        'meta_tag',
        'meta_title',
        'meta_description',
        'status'
    ];

    public function sportCategory(): BelongsTo
    {
        return $this->belongsTo(SportCategory::class, 'sport_category_id');
    }

    public function areas(): BelongsTo
    {
        return $this->belongsTo(Area::class, 'aria_id');
    }
}
