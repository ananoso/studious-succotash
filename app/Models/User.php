<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends \TCG\Voyager\Models\User
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'first_name',
        'surname',
        'company_name',
        'pesel',
        'nip'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function getViableContractors(array $filter = [])
    {
        $query = User::query();
        $excludedRoles = ['admin', 'manager', 'supervisor'];
        $filter['excluded_roles'] = $excludedRoles;
        return self::filter($query, $filter);
    }

    public function contracts()
    {
        return $this->hasMany(Contract::class);
    }

    public function userContracts()
    {
        return $this->hasMany(UserContract::class);
    }

    public function timeEntries()
    {
        return $this->hasMany(TimeEntry::class);
    }

    public function totalEarned()
    {
        return $this->formatNumber($this->timeEntries->sum('paycheck'));
    }

    public function totalContracts()
    {
        return $this->userContracts->count();
    }

    public function totalWorked()
    {
        return $this->timeEntries->sum('hours_amount');
    }

    /**
     * @param float $price
     * @param int $decimals
     * @return string
     */
    function formatNumber($number, $decimals = 2)
    {
        return is_null($decimals) ? $number : number_format(round(max($number, 0), $decimals, PHP_ROUND_HALF_UP), $decimals, '.', '');
    }

        /**
     * @param \Illuminate\Database\Query\Builder $query
     * @param array $filter
     * @return \Illuminate\Database\Query\Builder
     */
    private static function filter($query, array $filter = [])
    {
        if (array_has($filter, 'id'))
        {
            $query->where('id', '=', array_get($filter, 'id'));
        }
        if (array_has($filter, 'first_name'))
        {
            $query->where('first_name', 'like=', array_get($filter, 'first_name'));
        }
        if (array_has($filter, 'surname'))
        {
            $query->where('surname', 'like', array_get($filter, 'surname'));
        }
        if (array_has($filter, 'company_name'))
        {
            $query->where('company_name', 'like', array_get($filter, 'company_name'));
        }
        if (array_has($filter, 'pesel'))
        {
            $query->where('pesel', 'like', array_get($filter, 'pesel'));
        }
        if (array_has($filter, 'nip'))
        {
            $query->where('nip', 'like', array_get($filter, 'nip'));
        }
        if (array_has($filter, 'search'))
        {
            $query->where('first_name', 'like', array_get($filter, 'search'))
            ->orWhere('surname', 'like', array_get($filter, 'search'))
            ->orWhere('pesel', 'like', array_get($filter, 'search'));
        }
        if (array_has($filter, 'excluded_roles'))
        {
            $excludedRoles = array_get($filter, 'excluded_roles');
            $query->orWhereDoesntHave('role')
            ->orWhereHas('role', function ($query) use ($excludedRoles) {
                $query->whereNotIn('name', $excludedRoles);
            });
        }

        return $query;
    }
}
