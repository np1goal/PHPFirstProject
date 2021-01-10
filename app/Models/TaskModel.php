<?php namespace App\Models;

//use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class TaskModel extends Model {

    protected $table = 'tasks';
    protected $primaryKey = 'task_id';

    protected $allowedFields = ['task_description', 'team_id', 'project_id', 'task_status'];
}
