<?php namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

class CustomModel {
    protected $db;

    public function __construct(ConnectionInterface &$db) {
        $this->db =& $db;
    }

    public function joinEmployeeTeamTable() {
        return $this->db->table('Employee')
            ->join('team', 'team.team_id = Employee.team_id')
            ->get()
            ->getResult();
    }

//    public function updatePassword($user) {
//        return $this->db->table('users')
//                        ->where(['user_id' => $user['user_id']])
//                        ->update('password', password_hash($user['password'], PASSWORD_DEFAULT));
//    }
}
