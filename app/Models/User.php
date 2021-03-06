<?php

namespace App\Models;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Traits\FormatTimestamps;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable, FormatTimestamps;

    /**
     * Model fillable fields
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'first_name',
        'last_name',
        'password',
        'address_id'
    ];

    /**
     * Appends custom attributes
     *
     * @var array
     */
    protected $appends = [
        'full_name'
    ];

    /**
     * The hidden attributes
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];

    /**
     * User Customers
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function customers() {
        return $this->hasMany(Customer::class, 'user_id');
    }

    /**
     * User Jobs
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function jobs() {
        return $this->hasMany(Job::class, 'user_id');
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
     * Return the user full name
     *
     * @return string
     */
    public function getFullNameAttribute(){
        return "{$this->first_name} {$this->last_name}";
    }

    /**
     * Encrypt the new password
     *
     * @return string
     */
    public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);
    }

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
