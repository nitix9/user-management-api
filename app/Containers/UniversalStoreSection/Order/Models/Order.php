<?php

namespace App\Containers\UniversalStoreSection\Order\Models;

use App\Containers\UniversalStoreSection\Address\Models\Address;
use App\Containers\UniversalStoreSection\Shop\Models\Shop;
use App\Containers\UserSection\User\Models\User;
use App\Ship\Parents\Models\Model as ParentModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends ParentModel
{
    public $timestamps = true;

    const UPDATED_AT = null;
    protected $fillable = [
        'user_id',
        'shop_id',
        'status_id',
        'total_price',
        'adress_id',
    ];
    public function shop(): BelongsTo{
        return $this->belongsTo(Shop::class);
    }
    public function status(): BelongsTo{
        return $this->belongsTo(OrderStatus::class);
    }
    public function adress(): BelongsTo{
        return $this->belongsTo(Address::class);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
