<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    //public function users()
    //{
    //    return $this->belongsToMany(User::class);
    //}

    /**
     * Get all of the comments for the Contract
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contractors()
    {
        return $this->hasMany(UserContract::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_contracts', 'contract_id', 'user_id');
    }
}
