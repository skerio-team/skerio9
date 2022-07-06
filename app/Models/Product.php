<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Product extends Model  implements TranslatableContract
{
    use HasFactory;
    use Translatable; // 2. To add translation methods

    public $translatedAttributes = ['description'];

    protected $fillable=[
        'sport_category_id',
        'team_id',
        'product_category_id',
        'brand_id',
        'name',
        'image',
        'discount',
        'price',
        'status',
        'like',
        'sale_number',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];


    
    public function shoplikes()
    {
       return $this->hasMany(ShopLike::class, 'product_id');
    }

    public function cards()
    {
       return $this->hasMany(Card::class, 'product_id');
    }

    public function sport_categories()
    {
        return $this->belongsTo(SportCategory::class, 'sport_category_id');
    }

    public function product_categories()
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id');
    }

    public function brands(){
        return $this->belongsTo(Brand::class, 'brand_id'); // Model Name
    }

    public function sizes()
    {
        return $this->belongsToMany(Size::class, 'product_size');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'product_user');
    }

    public function teams()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }


}
