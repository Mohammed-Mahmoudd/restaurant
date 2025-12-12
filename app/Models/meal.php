<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class meal extends Model
{
    /** @use HasFactory<\Database\Factories\MealFactory> */
    use HasFactory;


    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'description',
        'price',
        'image'
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
