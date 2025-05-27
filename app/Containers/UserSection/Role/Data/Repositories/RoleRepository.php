<?php

namespace App\Containers\UserSection\Role\Data\Repositories;

use App\Containers\UserSection\Role\Models\Role;
use App\Ship\Parents\Repositories\Repository as ParentRepository;

/**
 * @template TModel of Role
 *
 * @extends ParentRepository<TModel>
 */
class RoleRepository extends ParentRepository
{
    protected $fieldSearchable = [
        // 'id' => '=',
    ];
}
