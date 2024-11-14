<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $table = 'category_parent';
    use HasFactory;
    protected $fillable = [
        'name',
        'slug'
    ];
    public function category_child()
    {
        return $this->hasMany(Category_child::class, 'id_parent'); // Assuming 'id' is the foreign key in the 'categories' table
    }
    public function product()
    {
        return $this->hasMany(Product::class, 'id_category_parent'); // Hoặc 'id_category_child' tùy thuộc vào cấu trúc của bạn
    }
}