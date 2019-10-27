<?php

namespace App\Http\Controllers\agent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Agent;
use Http\Requests\AgentRequest;
use Auth;

class AgentController extends Controller
{
    //
    public function index(Request $request){
        return response()->json([
            "status" => 'success',
            "Message" => 'Agent working'

        ], 200);
    }


    public function create(AgentRequest $request){

    $validated = $request->validated();
    return response()->json([
        "status" => "success",
        "message" => "Agent created",
        "data" => Agent::createAgent(Auth::id(), $validated, Auth::user())
    ], 200);
    }

    public function verify(Request $request){
        return response()->json([
            "status" => "success",
            "message" => "Agent Verified",
            "data" => Agent::verifyAgent(Auth::id())
        ], 200);

    }

    public function decline(){
        return response()->json([
            "status" => "success",
            "message" => "Agent Request Declined",
            "data" => Agent::declineAgent(Auth::id())
        ], 200);

    }


}
