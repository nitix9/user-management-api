<?php

namespace App\Containers\UserSection\User\Models;

use App\Containers\UniversalStoreSection\Shop\Models\Shop;
use App\Containers\UserSection\Role\Models\Role;
use App\Ship\Parents\Models\UserModel as ParentUserModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\User as Authenticatable;
class User extends ParentUserModel
{
    public $timestamps = false;

    protected $fillable = [
        'name',
        'last_name',
        'patronymic',
        'email',
        'password_hash',
        'role_id',
        'phone'
    ];
    public function getAuthPassword()
    {
        return $this->password_hash;
    }
    public function setPasswordAttribute($value)
    {
        $this->attributes['password_hash'] = Hash::make($value);
    }
    public function role(): BelongsTo{
        return $this->belongsTo(Role::class);
    }
    public function shops():HasMany
    {
        return $this->hasMany(Shop::class);
    }

    public function hasAdminRole(): bool
    {
        // TODO: Implement hasAdminRole() method.
    }
}
