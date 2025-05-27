<?php

namespace App\Containers\UniversalStoreSection\Order\Data\Repositories;

use App\Containers\UniversalStoreSection\Order\Models\OrderStatus;
use App\Ship\Parents\Repositories\Repository as ParentRepository;

/**
 * @template TModel of OrderStatus
 *
 * @extends ParentRepository<TModel>
 */
class OrderStatusRepository extends ParentRepository
{
    protected $fieldSearchable = [
        // 'id' => '=',
    ];
}
