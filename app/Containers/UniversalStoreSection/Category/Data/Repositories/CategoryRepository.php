<?php

namespace App\Containers\UniversalStoreSection\Category\Data\Repositories;

use App\Containers\UniversalStoreSection\Category\Models\Category;
use App\Ship\Parents\Repositories\Repository as ParentRepository;

/**
 * @template TModel of Category
 *
 * @extends ParentRepository<TModel>
 */
class CategoryRepository extends ParentRepository
{
    protected $fieldSearchable = [
        // 'id' => '=',
    ];
}
