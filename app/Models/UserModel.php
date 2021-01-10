<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model {

    protected $table = 'user';
    protected $allowedFields = ['fullname','email','password'];
    protected $beforeInsert = ['beforeInsertUpdate'];
    protected $beforeUpdate = ['beforeInsertUpdate'];

    public function beforeInsertUpdate(array $data) {
        if(isset($data['data']['password'])) {
            $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
        }
        return $data;
    }
}
