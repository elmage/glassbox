<?php

namespace App\Wallet;

use Illuminate\Database\Eloquent\Model;
use App\User;

class WalletHistory extends Model
{
    //

    protected $fillable = ['user_id', 'amount', 'previous_balance', 'type'];

    /**
     * Create Wallet History
     * @param id
     * @param amount
     * @param previous_balance
     * @param type
     */
    public function createWalletHistory(int $id, int $amount, int $previous_balance, $type){
        $user = (new User)->getUserById($id);
        return $user->walletHistory()->create([
            'amount' => $amount,
            'previous_balance' => $previous_balance,
            'type' => $type
        ]);
    }


    /**
     * Get User Wallet History
     *
     * @param id
     *
     * @return WalletHistory[]
     */
    public function getUserWalletHistory(int $id){
        $user = (new User)->getUserById($id);
        return $user->walletHistory()->all();
    }

    public function user(){
        return $this->belongsTo("App\User", 'user_id', 'id');
    }
};
