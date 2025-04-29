<?php

namespace App\Containers\UserSection\User\Data\Factories;

use App\Containers\UserSection\User\Models\User;
use App\Ship\Parents\Factories\Factory as ParentFactory;

/**
 * @template TModel of User
 *
 * @extends ParentFactory<TModel>
 */
class UserFactory extends ParentFactory
{
    /** @var class-string<TModel> */
    protected $model = User::class;

    public function definition(): array
    {
        return [];
    }
}
