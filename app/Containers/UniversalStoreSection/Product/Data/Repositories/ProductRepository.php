<?php

namespace App\Containers\UniversalStoreSection\Product\Data\Repositories;

use App\Containers\UniversalStoreSection\Product\Models\Product;
use App\Ship\Parents\Repositories\Repository as ParentRepository;

/**
 * @template TModel of Product
 *
 * @extends ParentRepository<TModel>
 */
class ProductRepository extends ParentRepository
{
    protected $fieldSearchable = [
        // 'id' => '=',
    ];
}
