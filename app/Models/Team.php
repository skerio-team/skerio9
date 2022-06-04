<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable=[
        'sport_category_id',
        'name',
        'image',
        'address',
        'year',
        'official_site',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];


    public function sport_categories()
    {
        return $this->belongsTo(SportCategory::class, 'sport_category_id');
    }


}
