<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class ProductCategory extends Model  implements TranslatableContract
{
    use HasFactory;
    use Translatable; // 2. To add translation methods

    public $translatedAttributes = ['name'];

    protected $fillable=[
        'slug',
    ];


    public function products()
    {
        return $this->hasMany(Product::class);
    }

}
