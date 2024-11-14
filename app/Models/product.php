<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;

    protected $table = 'product';

    protected $fillable = [
        'name',
        'id_category_parent',
        'id_category_child',
        'slug',
        'primary_image',
        'quantity_favorite',
        'second_image',
        'rate'
    ];

    // Mối quan hệ với ProductMeta
    public function product_meta()
    {
        return $this->hasMany(product_meta::class, 'id_product');
    }
    public function color()
    {
        return $this->hasMany(color::class, 'id_product');
    }
    public function size()
    {
        return $this->hasMany(size::class, 'id_product');
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'id_category_parent'); // Hoặc 'id_category_child' tùy thuộc vào cấu trúc của bạn
    }
    public function favorite_product()
    {
        return $this->hasMany(favorite_product::class,'id_product');
    }
    public function start()
    {
        return $this->hasMany(start::class,'id_product');
    }
    //rating
    public function rating()
    {
        return $this->hasMany(ratingModel::class,'id_product');
    }
}
