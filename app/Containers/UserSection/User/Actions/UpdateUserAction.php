<?php

namespace App\Containers\UserSection\User\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\UserSection\User\Models\User;
use App\Containers\UserSection\User\Tasks\UpdateUserTask;
use App\Containers\UserSection\User\UI\API\Requests\UpdateUserRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateUserAction extends ParentAction
{
    public function __construct(
        private readonly UpdateUserTask $updateUserTask,
    ) {
    }

    /**
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateUserRequest $request): User
    {
        $data = $request->sanitizeInput([
            'name'=>$request->name,
            'email'=>$request->email
        ]);

        return $this->updateUserTask->run($data, $request->id);
    }
}
