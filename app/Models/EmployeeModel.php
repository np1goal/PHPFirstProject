<?php namespace App\Models;

use CodeIgniter\Model;

class EmployeeModel extends Model {

    protected $table = 'Employee';
    protected $primaryKey = 'employee_id';
    protected $allowedFields = ['employee_name', 'employee_position', 'team_id', 'pay_scale', 'pay_scale_measure', 'notes'];
}
