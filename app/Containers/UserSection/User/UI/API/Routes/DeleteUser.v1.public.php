<?php

/**
 * @apiGroup           User
 * @apiName            Delete
 *
 * @api                {DELETE} /v1/users/:id Delete
 * @apiDescription     Endpoint description here...
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated ['permissions' => '', 'roles' => '']
 *
 * @apiHeader          {String} accept=application/json
 * @apiHeader          {String} authorization=Bearer
 *
 * @apiParam           {String} parameters here...
 *
 * @apiSuccessExample  {json} Success-Response:
 * HTTP/1.1 200 OK
 * {
 *     // Insert the response of the request here...
 * }
 */

use App\Containers\UserSection\User\UI\API\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::delete('users/{id}', [UserController::class, 'delete']);

