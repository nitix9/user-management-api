<?php

namespace App\Containers\UserSection\User\Actions;

use App\Containers\UserSection\User\Models\User;
use App\Containers\UserSection\User\Tasks\FindUserByIdTask;
use App\Containers\UserSection\User\UI\API\Requests\FindUserByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindUserByIdAction extends ParentAction
{
    public function __construct(
        private readonly FindUserByIdTask $findUserByIdTask,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run(FindUserByIdRequest $request): User
    {
        return $this->findUserByIdTask->run($request->id);
    }
}
