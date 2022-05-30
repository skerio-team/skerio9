<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class SportCategory extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;  // 2. To add translation methods

    // 3. To define which attributes needs to be translated

    public $translatedAttributes = ['name'];

    protected $fillable=[
        'slug',
    ];

}
