<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'price',
        'stock',
        'description',
        'image'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function userTransactions()
    {
        return $this->hasMany(UserTransaction::class);
    }

    public function adminTransactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
