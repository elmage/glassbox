<?php

namespace App\Wallet;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Wallet\WalletHistory;

class Wallet extends Model
{
    //
    protected $fillable = ['balance', 'user_id'];


    /**
     * Get Wallet using UserId
     *
     * @param id user
     * @return User wallet
     */

    public function getWalletByUserId(int $id){
        return User::getUserById($id)->wallet();
    }

    /**
     * Get Wallet using UserId
     *
     * @param id user
     * @return User wallet
     */
    public function createWallet(int $id, User $user){
        $user = $user->getUserById($id);
        return  $user->wallet()->create();
    }

    /**
     * Credit Wallet
     *
     * @param id,
     * @param amount,
     *
     * @return true
     */

    public function credit(int $id, int $amount){
        $wallet = $this->getWalletByUserId($id);
        $balance = $wallet->balance;
        $new_balance = $amount + $balance;
        $wallet->balance = $new_balance;
        $wallet->save();
        $wallet_history = new WalletHistory();
        $wallet_history->createWalletHistory($id, $amount, $balance, "Credit");
        return true;
    }


    /**
     * Debit Wallet
     *
     * @param id,
     * @param amount,
     *
     * @return true
     */

    public function debit(int $id, int $amount){
        $wallet = $this->getWalletByUserId($id);
        $balance = $wallet->balance;
        $new_balance = $amount - $balance;
        $wallet->balance = $new_balance;
        $wallet->save();
        $wallet_history = new WalletHistory();
        $wallet_history->createWalletHistory($id, $amount, $balance, "Debit");
        return true;
    }

    public function user(){
        return $this->belongsTo("App\User", 'user_id', 'id');
    }

}
