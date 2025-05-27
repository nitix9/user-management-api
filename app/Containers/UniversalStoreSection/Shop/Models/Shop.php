<?php

namespace App\Containers\UniversalStoreSection\Shop\Models;

use App\Containers\UserSection\User\Models\User;
use App\Ship\Parents\Models\Model as ParentModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Shop extends ParentModel
{
    protected $fillable = [
        'user_id',
        'name',
        'description',
        'custom_domain',
    ];
    public function user():BelongsTo{
        return $this->belongsTo(User::class);
    }
}
