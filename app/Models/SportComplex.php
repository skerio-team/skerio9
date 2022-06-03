<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Arr;

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

    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;

    public function sportCategory(): BelongsTo
    {
        return $this->belongsTo(SportCategory::class, 'sport_category_id');
    }

    public function areas(): BelongsTo
    {
        return $this->belongsTo(Area::class, 'aria_id');
    }

    public function getStatusList(): array
    {
        return [
            self::STATUS_ACTIVE =>  ['Faol'],
            self::STATUS_INACTIVE =>  ['Nofaol'],
        ];
    }

    public function getStatusName(int $name)
    {
        return Arr::get(self::getStatusList(), $name);
    }
}
