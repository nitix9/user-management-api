<?php

namespace App\Containers\UniversalStoreSection\Address\Data\Repositories;

use App\Containers\UniversalStoreSection\Address\Models\Address;
use App\Ship\Parents\Repositories\Repository as ParentRepository;

/**
 * @template TModel of Address
 *
 * @extends ParentRepository<TModel>
 */
class AddressRepository extends ParentRepository
{
    protected $fieldSearchable = [
        // 'id' => '=',
    ];
}
