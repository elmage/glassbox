<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Agent extends Model
{
    protected $fillable = [
        'user_id', 'bvn', 'id_front', 'id_back', 'id_no', 'street', 'city', 'state_id', 'status'
    ];


    /**
     * @param
     *
     *  @return Agents
     */

    public function getAllAgent() {
        return $this->all();
    }

    /**
     * @param $id
     *
     *  @return Agent
     */

    public function getAgentById($id){
        return User::getUserById($id)->agent();
    }

    public function createAgent(int $id, $data, User $user){
        $user = $user->getUserById($id);
        return  $user->agent()->create($data);
    }

    public function verifyAgent(int $id){
        $verified = 2;
        $agent = $this->getAgentById($id);
        $this->$agent->status->$verified;
        return $agent;
    }

    public function declineAgent(int $id){
        $declined = 3;
        $agent = $this->getAgentById($id);
        $this->$agent->status->$declined;
        return $agent;
    }


    public function editAgent(){

    }

    public function deleteAgent(){

    }


    public function user(){
        return $this->belongsTo("App\User", 'user_id', 'id');
    }
}
