<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'price',
        'description'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function galleries()
    {
        return $this->hasMany(ProductGalery::class, 'products_id', 'id');
    }

    public function transactionItem()
    {
        return $this->hasMany(TransactionItem::class, 'products_id', 'id');
    }
}
