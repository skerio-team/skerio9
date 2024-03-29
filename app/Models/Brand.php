<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Brand extends Model
{
    use HasFactory;

    protected $table = 'brands';
    protected $fillable=[
       'name',
       'image',
    ];
    
    public function products(): Hasmany
    {
        return $this->hasMany(Product::class); // Model Name
    }

    const IMAGE_PATH = 'admin/images/brands/';

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
