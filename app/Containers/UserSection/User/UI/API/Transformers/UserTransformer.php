<?php

namespace App\Containers\UserSection\User\UI\API\Transformers;

use App\Containers\UserSection\User\Models\User;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class UserTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [];

    protected array $availableIncludes = [];

    public function transform(User $user): array
    {
        return [
            'object' => $user->getResourceKey(),
            'id' => $user->getHashedKey(),
            'created_at' => $user->created_at,
            'updated_at' => $user->updated_at,
            'readable_created_at' => $user->created_at->diffForHumans(),
            'readable_updated_at' => $user->updated_at->diffForHumans(),
        ];
    }
}
