<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'isAvailable'];


    public static function getAvailable()
    {
        return Product::where('isAvailable', 1)->get();
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
