<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;


    protected $table = "products";

    protected $fillable = [
        'name',
        
        'price',
        'category_id',
        
        
        'image',
        
    ];
     protected $attributes = array (
       
        'buyers' =>0,
        'views' => 0,

     );

     
    public function category()
    {
        return $this->belongTo(Category::class);
       
    }
    






}
