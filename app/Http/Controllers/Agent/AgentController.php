<?php

namespace App\Http\Controllers\agent;

use App\Http\Controllers\Controller;
use App\Http\Requests\AgentRequest;
use Illuminate\Http\Request;
use App\Agent;
use Illuminate\Support\Facades\Auth;

class AgentController extends Controller
{
    //
    public function index(Request $request){
        return response()->json([
            "status" => 'success',
            "Message" => 'Agent working'

        ], 200);
    }


    public function create(AgentRequest $request, Agent $agent){

        $validated = $request->validated();
        return response()->json([
            "status" => "success",
            "message" => "Agent created",
            "data" => $agent->createAgent(Auth::id(), $validated, Auth::user())
        ], 200);
    }

    public function verify(Request $request, Agent $agent){
        return response()->json([
            "status" => "success",
            "message" => "Agent Verified",
            "data" => $agent->verifyAgent(Auth::id())
        ], 200);

    }

    public function decline(Agent $agent){
        return response()->json([
            "status" => "success",
            "message" => "Agent Request Declined",
            "data" => $agent->declineAgent(Auth::id())
        ], 200);

    }


}
