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

    /**
     * Create Agent
     *
     * @param $id, $data,
     *
     * @return Agent
     */

    public function createAgent(int $id, $data, User $user){
        $user = $user->getUserById($id);
        return  $user->agent()->create($data);
    }

    /**
     * Verify Agent
     * @param $id
     *
     * @return Agent
     */

    public function verifyAgent(int $id){
        $verified = 2;
        $agent = $this->getAgentById($id);
        $this->$agent->status->$verified;
        return $agent;
    }

    /**
     * Verify Agent
     * @param $id
     *
     * @return Agent
     */

    public function declineAgent(int $id){
        $declined = 3;
        $agent = $this->getAgentById($id);
        $this->$agent->status->$declined;
        return $agent;
    }


    public function updateAgent(int $id, $data) {
        $agent = $this->getAgentById($id);
        return $agent->update($data);
    }

    public function deleteAgent(int $id) {
        $agent = $this->getAgentById($id);
        $agent->delete();
        return true;
    }


    public function user(){
        return $this->belongsTo("App\User", 'user_id', 'id');
    }
}
