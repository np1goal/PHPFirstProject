<?php namespace App\Models;

use CodeIgniter\Model;

class ProjectModel extends Model {

    protected $table = 'projects';
    protected $primaryKey = 'project_id';

    protected $allowedFields = ['project_title', 'project_owner_id', 'project_description'];
}

