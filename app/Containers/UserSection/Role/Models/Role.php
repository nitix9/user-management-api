<?php

namespace App\Containers\UserSection\Role\Models;

use App\Ship\Parents\Models\Model as ParentModel;

class Role extends ParentModel
{
    protected $fillable = [
        'name',
    ];
}
