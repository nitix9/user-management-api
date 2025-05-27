<?php

namespace App\Containers\UniversalStoreSection\Order\Models;

use App\Ship\Parents\Models\Model as ParentModel;

class OrderStatus extends ParentModel
{
    public $timestamps = false;
    protected $table = 'order_statuses';
    protected $fillable = [
        'name'
    ];
}
