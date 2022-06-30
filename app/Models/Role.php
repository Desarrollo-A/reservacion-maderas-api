<?php

namespace App\Models;

use App\Models\Contracts\IScopeFilter;
use App\Models\Traits\Sortable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model implements IScopeFilter
{
    use HasFactory,Sortable;

    public array $allowebSorts = ['name'];
    protected $fillable = ['name','status'];
    protected $casts = [
        'id' => 'integer',
        'status' => 'boolean',
        'created_ad' => 'datetime',
        'updated_at' => 'datetime'
    ];
    public function scopeFilter(Builder $query, array $params = []): Builder
    {
        if (empty($params)) {
            return $query;
        }

        if(isset($params['name']) && trim(string: $params['name'] !== '')){
            $query->where(column:'name',operator:'LIKE',value:"%${params['name']}%");
        }
        return $query;
       
    }
}
