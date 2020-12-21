<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TimeEntry extends Model
{
    /**
     * Model fillable fields
     *
     * @var array
     */
    protected $fillable = [
        'comment',
        'spent_on',
        'hours',
        'job_id'
    ];

    /**
     * Job of the time entry
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function job() {
        return $this->belongsTo(Job::class, 'job_id');
    }
}
