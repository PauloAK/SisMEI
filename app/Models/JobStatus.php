<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobStatus extends Model
{
    /**
     * Model fillable fields
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'is_closed',
        'is_default'
    ];

    /**
     * Model field casts
     *
     * @var array
     */
    protected $casts = [
        'is_closed' => 'boolean',
        'is_default' => 'boolean'
    ];

    /**
     * Jobs with status
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function jobs() {
        return $this->hasMany(Job::class, 'status_id');
    }
}
