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

    protected $table = 'news';

    protected $fillable=[
        'sport_category_id',
        'continent_id',
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

    const IMAGE_PATH = 'admin/images/news/';

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
