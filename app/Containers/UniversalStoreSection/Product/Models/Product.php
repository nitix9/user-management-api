<?php

namespace App\Containers\UniversalStoreSection\Product\Models;

use App\Containers\UniversalStoreSection\Category\Models\Category;
use App\Containers\UniversalStoreSection\Shop\Models\Shop;
use App\Ship\Parents\Models\Model as ParentModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends ParentModel
{
    public $timestamps = false;
    protected $fillable = [
        'shop_id',
        'name',
        'price',
        'description',
        'category_id',
    ];
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    public function shop():BelongsTo{
        return $this->belongsTo(Shop::class);
    }
}
