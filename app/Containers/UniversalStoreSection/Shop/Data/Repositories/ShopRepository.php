<?php

namespace App\Containers\UniversalStoreSection\Shop\Data\Repositories;

use App\Containers\UniversalStoreSection\Shop\Models\Shop;
use App\Ship\Parents\Repositories\Repository as ParentRepository;

/**
 * @template TModel of Shop
 *
 * @extends ParentRepository<TModel>
 */
class ShopRepository extends ParentRepository
{
    protected $fieldSearchable = [
        // 'id' => '=',
    ];
}
