<?php namespace App\Models;

use CodeIgniter\Model;
//use CodeIgniter\Database\ConnectionInterface;

class ToDoListModel extends Model {

    protected $table = 'to_do_list';
    protected $primaryKey = 'item_id';
    protected $allowedFields = ['item', 'item_status', 'employee_id'];
}