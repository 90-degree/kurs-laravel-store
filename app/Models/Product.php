<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'isAvailable'];


    public static function getAvailable($pages)
    {
        return self::where('isAvailable', 1)->paginate($pages);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
