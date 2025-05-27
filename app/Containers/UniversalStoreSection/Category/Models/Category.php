<?php

namespace App\Containers\UniversalStoreSection\Category\Models;

use App\Containers\UniversalStoreSection\Product\Models\Product;
use App\Ship\Parents\Models\Model as ParentModel;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends ParentModel
{
    public $timestamps = false;
    protected $fillable = [
        'name',
    ];
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
