<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SportCategory;
use Illuminate\Support\Str;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Home extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;  // 2. To add translation methods

    // 3. To define which attributes needs to be translated

    public $translatedAttributes = ['title','description'];

    protected $table = 'homes';
    protected $fillable=[
        'image',
        'sport_category_id',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];

    const IMAGE_PATH = 'admin/images/homes/';

    public function deleteImage(): bool
    {
        $images = explode("|", $this->image);

        foreach ($images as $img)
        {
            unlink(self::IMAGE_PATH . $img);
        }

        return true;
    }
    public function sport_categories()
    {
        return $this->belongsTo(SportCategory::class, 'sport_category_id');
    }
}
