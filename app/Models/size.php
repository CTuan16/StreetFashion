<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class size extends Model
{
    protected $table = 'size';
    use HasFactory;
    public function product()
    {
        return $this->belongsTo(product::class, 'id_product');
    }
}