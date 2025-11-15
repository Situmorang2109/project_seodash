<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'product_id',
        'type',
        'amount',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
