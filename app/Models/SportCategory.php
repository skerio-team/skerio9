<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SportCategory extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;  // 2. To add translation methods

    // 3. To define which attributes needs to be translated

    public $translatedAttributes = ['name'];

    protected $table = 'sport_categories';
    
    protected $fillable=[
        'slug',
    ];

    public function news(){
        return $this->hasMany(News::class); // Model Name
    }

    public function sportComplexes(): HasMany
    {
        return $this->HasMany(SportComplex::class);
    }

    public function tickets(): HasMany
    {
        return $this->hasMany(Ticket::class);
    }
}
