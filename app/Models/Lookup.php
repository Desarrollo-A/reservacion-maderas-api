<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Lookup extends Model
{
    use HasFactory;

    protected $fillable = ['type', 'name'];

    protected $casts = [
        'id' => 'integer',
        'type' => 'integer',
        'status' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'status_id', 'id');
    }
}
