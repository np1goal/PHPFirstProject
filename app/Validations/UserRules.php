<?php namespace App\Validations;

use App\Models\EmployeeModel;
use App\Models\UserModel;

class UserRules {

    public function checkEmployeeExists(string $str, string $fields, array $data) {
        $employeeModel = new EmployeeModel();
        $user = $employeeModel->where('employee_name',$data['fullname'])->first();

        if(!$user)
            return false;

        return true;
    }

    public function validateUser(string $str, string $fields, array $data) {
        $model = new UserModel();
        $user = $model->where('email',$data['email'])->first();

        if(! $user)
            return false;

        return password_verify($data['password'], $user['password']);
    }
}
