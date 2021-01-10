<?php namespace App\Models;

use CodeIgniter\Model;

class TeamModel extends Model {

    protected $table = 'team';
    protected $primaryKey = 'team_id';
    protected $allowedFields = ['team_name'];
}