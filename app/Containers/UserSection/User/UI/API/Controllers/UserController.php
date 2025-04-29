<?php

namespace App\Containers\UserSection\User\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\UserSection\User\Actions\CreateUserAction;
use App\Containers\UserSection\User\Actions\DeleteUserAction;
use App\Containers\UserSection\User\Actions\FindUserByIdAction;
use App\Containers\UserSection\User\Actions\GetAllUsersAction;
use App\Containers\UserSection\User\Actions\UpdateUserAction;
use App\Containers\UserSection\User\UI\API\Requests\CreateUserRequest;
use App\Containers\UserSection\User\UI\API\Requests\DeleteUserRequest;
use App\Containers\UserSection\User\UI\API\Requests\FindUserByIdRequest;
use App\Containers\UserSection\User\UI\API\Requests\ListUsersRequest;
use App\Containers\UserSection\User\UI\API\Requests\UpdateUserRequest;
use App\Containers\UserSection\User\UI\API\Transformers\UserTransformer;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;
use Prettus\Repository\Exceptions\RepositoryException;

class UserController extends ApiController
{
    /**
     * @throws InvalidTransformerException
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function create(CreateUserRequest $request, CreateUserAction $action): JsonResponse
    {
       $user = $action->run($request);

       return $this->created($this->transform($user, UserTransformer::class));
    }

    /**
     * @throws InvalidTransformerException
     * @throws NotFoundException
     */
    public function findById(FindUserByIdRequest $request, FindUserByIdAction $action): array
    {
     $user = $action->run($request);

     return $this->transform($user, UserTransformer::class);
    }

    /**
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function list(ListUsersRequest $request, GetAllUsersAction $action): array
    {
      $users = $action->run($request);

      return $this->transform($users, UserTransformer::class);
    }

    /**
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function update(UpdateUserRequest $request, UpdateUserAction $action): array
    {
       $user = $action->run($request);

       return $this->transform($user, UserTransformer::class);
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function delete(DeleteUserRequest $request, DeleteUserAction $action): JsonResponse
    {
       $action->run($request);

       return $this->noContent();
    }
}
