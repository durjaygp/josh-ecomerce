<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [''];

    public function productCategory(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class,'product_category_id');
    }
}
