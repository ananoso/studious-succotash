<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserContract extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    /**
     * Get the user that owns the UserContract
     *
     *
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the contract that owns the UserContract
     *
     *
     */
    public function contract()
    {
        return $this->belongsTo(Contract::class);
    }
}
