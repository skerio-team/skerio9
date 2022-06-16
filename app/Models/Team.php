<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Team extends Model
{
    use HasFactory;

    protected $fillable=[
        'sport_category_id',
        'name',
        'image',
        'address',
        'year',
        'official_site',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];


    public function sport_categories()
    {
        return $this->belongsTo(SportCategory::class, 'sport_category_id');
    }

    public function products()
    {
        return $this->hasMany(Team::class);
    }

    public function tickets(): HasMany
    {
        return $this->hasMany(Ticket::class);
    }

    const IMAGE_PATH = 'admin/images/teams/';

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
