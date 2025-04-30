<?php

namespace App\Containers\UserSection\User\Models;

use App\Ship\Parents\Models\Model as ParentModel;
use Illuminate\Support\Facades\Hash; 
class User extends ParentModel
{
    protected $fillable = [
        'name',
        'email',
        'password',
    ];
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }
}
