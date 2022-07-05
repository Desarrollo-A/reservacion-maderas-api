<?php

namespace App\Models;

use App\Models\Contracts\IScopeFilter;
use App\Models\Traits\Sortable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements IScopeFilter
{
    use HasApiTokens, HasFactory, Notifiable, Sortable;

    public array $allowedSorts = ['no_employee', 'full_name', 'email', 'personal_phone', 'office_phone', 'position',
        'area'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'no_employee',
        'full_name',
        'email',
        'password',
        'personal_phone',
        'office_phone',
        'position',
        'area',
        'status',
        'role_id'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'id' => 'integer',
        'status' => 'integer',
        'role_id' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public function scopeFilter(Builder $query, array $params = []): Builder
    {
        return $query;
    }

    public function lookup(): BelongsTo
    {
        return $this->belongsTo(Lookup::class, 'status_id', 'id');
    }
}
