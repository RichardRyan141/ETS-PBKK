<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quality extends Model
{
    use HasFactory;

    protected $table = 'Quality';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name'
    ];

    public function product()
    {
        return $this->hasMany(Product::class, 'id');
    }
}
