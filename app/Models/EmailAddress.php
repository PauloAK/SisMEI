<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmailAddress extends Model
{
    /**
     * Model fillable fields
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'customer_id',
        'default'
    ];

    /**
     * Model field casts
     *
     * @var array
     */
    protected $casts = [
        'default' => 'boolean'
    ];

    /**
     * Email address of the customer
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer() {
        return $this->belongsTo(Customer::Class, 'customer_id');
    }
}
