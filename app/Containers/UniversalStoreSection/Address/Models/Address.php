<?php

namespace App\Containers\UniversalStoreSection\Address\Models;

use App\Containers\UserSection\User\Models\User;
use App\Ship\Parents\Models\Model as ParentModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Address extends ParentModel
{
    public $timestamps = false;
    protected $fillable=[
        'address',
        'user_id',
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
