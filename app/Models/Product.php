<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'Product';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name', 'description', 'flaws', 'product_photo', 'category_id', 'quality_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function quality()
    {
        return $this->belongsTo(Quality::class, 'quality_id');
    }
    
}
