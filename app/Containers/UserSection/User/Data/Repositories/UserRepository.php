<?php

namespace App\Containers\UserSection\User\Data\Repositories;

use App\Containers\UserSection\User\Models\User;
use App\Ship\Parents\Repositories\Repository as ParentRepository;

/**
 * @template TModel of User
 *
 * @extends ParentRepository<TModel>
 */
class UserRepository extends ParentRepository
{
    protected $fieldSearchable = [
        // 'id' => '=',
    ];
    public function model(): string
    {
        return User::class;
    }
}
