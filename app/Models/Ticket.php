<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ticket extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;

    protected $table = 'tickets';
    protected $fillable = [
        'sport_category_id',
        'team1_id',
        'team2_id',
        'stadium_section_id',
        'name',
        'date',
        'price',
        'image',
        'meta_tag',
        'meta_title',
        'meta_description',
        'status',
    ];

    public $translatedAttributes = ['description'];

    public function sportCategories(): BelongsTo
    {
        return $this->belongsTo(SportCategory::class, 'sport_category_id');
    }

    public function teams1(): BelongsTo
    {
        return $this->belongsTo(Team::class, 'team1_id');
    }

    public function teams2(): BelongsTo
    {
        return $this->belongsTo(Team::class, 'team2_id');
    }

    public function stadiumSections(): BelongsTo
    {
        return $this->belongsTo(StadiumSection::class, 'stadium_section_id');
    }

    const IMAGE_PATH = 'admin/images/tickets/';

    public function deleteImage(): bool
    {
        $images = explode("|", $this->image);

        foreach ($images as $img)
        {
            unlink(self::IMAGE_PATH . $img);
        }

        return true;
    }
}
