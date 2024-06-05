<?php

namespace App\Http\Controllers\Admin\Team;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\TeamInterface;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public $interface;
    public function __construct(TeamInterface $interface){
        $this->interface = $interface;
    }

    public function team_form(){
        return $this->interface->team_form();
    }

    public function insert_team(Request $request){
        return $this->interface->insert_team($request);
    }

    public function team_list(){
        return $this->interface->team_list();
    }

    public function update_form($team_id){
        return $this->interface->update_form($team_id);
    }

    public function update_team(Request $request){
        return $this->interface->update_team($request);
    }

    public function delete_team(Request $request){
        return $this->interface->delete($request);
    }
}
