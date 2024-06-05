<?php
namespace App\Http\Interfaces;

interface TeamInterface{
    public function team_form();
    public function insert_team($request);
    public function team_list();
    public function update_form($team_id);
    public function update_team($request);
    public function delete($request);
    
}