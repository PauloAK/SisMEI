<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    /**
     * Model fillable fields
     *
     * @var array
     */
    protected $fillable = [
        'company_name',
        'fantasy_name',
        'active',
        'cnpj',
        'state_registration',
        'municipal_registration',
        'address_id',
        'user_id'
    ];

    /**
     * Model field casts
     *
     * @var array
     */
    protected $casts = [
        'active' => 'boolean'
    ];

    /**
     * Customers email addresses
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function email_adresses() {
        return $this->hasMany(EmailAddress::class, 'customer_id');
    }

    /**
     * Customer Addresses
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function address() {
        return $this->hasOne(Address::class, 'address_id');
    }

    /**
     * Customer Jobs
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function jobs() {
        return $this->hasMany(Job::class, 'customer_id');
    }
}
