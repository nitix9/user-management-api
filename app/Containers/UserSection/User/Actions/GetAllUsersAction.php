<?php

namespace App\Containers\UserSection\User\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\UserSection\User\Tasks\GetAllUsersTask;
use App\Containers\UserSection\User\UI\API\Requests\ListUsersRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllUsersAction extends ParentAction
{
    public function __construct(
        private readonly GetAllUsersTask $listUsersTask,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(ListUsersRequest $request): mixed
    {
        return $this->listUsersTask->run();
    }
}
