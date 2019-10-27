<?php

namespace App\Http\Controllers\Wallet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Wallet\Wallet;

class WalletController extends Controller
{
    //

    public function credit(Request $request, Wallet $wallet){
        $amount = int($request->only(['amount']));
        return response()->json([
            "status" => "success",
            "message" => "Wallet Credited",
            "data" => $wallet->credit(Auth::id(), $amount)
        ], 200);
    }

    public function debit(Request $request, Wallet $wallet){
        $amount = int($request->only(['amount']));
        return response()->json([
            "status" => "success",
            "message" => "Wallet Credited",
            "data" => $wallet->debit(Auth::id(), $amount)
        ], 200);}
}
