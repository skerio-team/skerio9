<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SportComplex extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;

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
        'working_status',
        'dress_room',
        'food',
        'bath_room',
        'sit_place',
        'meta_tag',
        'meta_title',
        'meta_description',
        'status'
    ];

    public $translatedAttributes = ['description'];

    const IMAGE_PATH = 'admin/images/complexes/';

    public function sportCategory(): BelongsTo
    {
        return $this->belongsTo(SportCategory::class, 'sport_category_id');
    }

    public function areas(): BelongsTo
    {
        return $this->belongsTo(Area::class, 'area_id');
    }

    public function isImageExists(): bool
    {
        return file_exists(self::IMAGE_PATH . $this->image);
    }

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
