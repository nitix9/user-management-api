<?php

namespace App\Containers\UserSection\Role\Models;

use App\Ship\Parents\Models\Model as ParentModel;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends ParentModel
{
    public $timestamps = false;
    protected $fillable = [
        'name',
    ];
    public function users(): HasMany{
        return $this->hasMany(Role::class);
    }
}
