<?php

namespace App\Containers\UserSection\User\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\UserSection\User\Models\User;
use App\Containers\UserSection\User\Tasks\CreateUserTask;
use App\Containers\UserSection\User\UI\API\Requests\CreateUserRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;


class CreateUserAction extends ParentAction
{
    public function __construct(
        private readonly CreateUserTask $createUserTask,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateUserRequest $request): User
    {
        $data = $request->sanitizeInput([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=> $request->password
        ]);

        return $this->createUserTask->run($data);
    }
}
