<?php

namespace App\Containers\UniversalStoreSection\Order\Data\Repositories;

use App\Containers\UniversalStoreSection\Order\Models\Order;
use App\Ship\Parents\Repositories\Repository as ParentRepository;

/**
 * @template TModel of Order
 *
 * @extends ParentRepository<TModel>
 */
class OrderRepository extends ParentRepository
{
    protected $fieldSearchable = [
        // 'id' => '=',
    ];
}
