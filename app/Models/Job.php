<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    /**
     * Model fillable fields
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'status_id',
        'user_id',
        'customer_id',
        'parent_id',
        'estimated_hours',
        'due_date',
        'start_date',
        'done_ratio'
    ];

    /**
     * Job User owner
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Job Customer
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer() {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    /**
     * Job Comments
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments() {
        return $this->hasMany(JobComment::class, 'job_id');
    }

    /**
     * Job Status
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function status() {
        return $this->hasOne(JobStatus::class, 'status_id');
    }

    /**
     * Job time entries
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function time_entries() {
        return $this->hasMany(TimeEntry::class, 'job_id');
    }
}
