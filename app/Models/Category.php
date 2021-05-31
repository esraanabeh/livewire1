<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table='categories';
    protected $fillable = [
        'nameAr',
        'nameEn',
        
        'image',
        
    ];

    public static function Categories(){
        $getCategories = Category:: with('products')->get();
        $getCategories = json_decode(json_encode($getCategories),true);
       return $getCategories;


    }





    public function products()
    {
        return $this->hasMany(Product::class);
    }





}
