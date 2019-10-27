<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Returns a collection of all users in the database
     * @return User[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getAllUsers()
    {
        return $this->all();
    }


    /**
     * @param $id
     *
     *  @return User
     */
    public function getUserById($id)
    {
        return User::find($id);
    }

    public function agent(){
        return $this->hasOne('App\Agent');
    }

    public function wallet(){
        return $this->hasOne("App\Wallet\Wallet");
    }
    public function walletHistory(){
        return $this->hasMany("App\Wallet\Wallet");
    }
}
