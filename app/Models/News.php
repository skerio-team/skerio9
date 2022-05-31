<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class News extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable; // 2. To add translation methods

    public $translatedAttributes = ['title','description'];

    protected $fillable=[
        'sport_category_id',
        'image',
        'status',
        'special',
        'popularity',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];
    public function sport_categories()
    {
        return $this->belongsTo(SportCategory::class);
    }
}
