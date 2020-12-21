<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobComment extends Model
{
    /**
     * Model fillable fields
     *
     * @var array
     */
    protected $fillable = [
        'comment',
        'job_id'
    ];

    /**
     * Commented job
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function job() {
        return $this->belongsTo(Job::class, 'job_id');
    }
}
