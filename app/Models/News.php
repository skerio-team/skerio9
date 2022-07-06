<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class News extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable; // 2. To add translation methods

    public function likes()
    {
       return $this->hasMany(Like::class, 'news_id');
    }

    public $translatedAttributes = ['title','description'];

    protected $table = 'news';

    protected $fillable=[
        'sport_category_id',
        'continent_id',
        'image',
        'status',
        'special',
        'popularity',
        'slug',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];

    public function sport_categories()
    {
        return $this->belongsTo(SportCategory::class, 'sport_category_id');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class)->whereNull('parent_id');
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
