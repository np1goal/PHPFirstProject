<?php namespace App\Controllers;

use App\Models\EmployeeModel;
use App\Models\CustomModel;
use App\Models\ProjectModel;
use App\Models\TaskModel;
use App\Models\TeamModel;
use App\Models\ToDoListModel;
use App\Models\UserModel;

class Dashboard extends BaseController {

    public function index() {
        $data = [
            'title' => 'Dashboard'
        ];
        return view('canvas/dashboard', $data);
    }

    public function projects() {
        $data = [
            'title' => 'Projects'
        ];

        $projectModel = new ProjectModel();
        $employeeModel = new EmployeeModel();
        $taskModel = new TaskModel();
        $projects = [];

        foreach($projectModel->findAll() as $project) {
            $project['tasks'] = $taskModel->where(['project_id' => $project['project_id']])->get()->getResult();
            $project['owner_name'] = $employeeModel->find($project['project_owner_id'])['employee_name'];
            array_push($projects, $project);
        }
        $data['projects'] = $projects;
        return view('canvas/projects', $data);
    }

    public function addProjects() {
        $data = [
            'title' => 'Add Projects'
        ];

        helper(['form']);

        if($this->request->getMethod() == 'post') {

            $rules = [
                'project_title' => [
                    'rules' => 'required',
                    'label' => 'Project title',
                    'error' => [
                        'required' => 'Enter Project Title Name'
                    ]
                ],
                'fullname' => [
                    'rules' => 'required|checkEmployeeExists[fullname]',
                    'label' => 'Owner name',
                    'error' => [
                        'required' => 'Enter Project Owner Name'
                    ]
                ]
            ];

            if($this->validate($rules)) {
                $projectModel = new ProjectModel();

                $employeeModel = new EmployeeModel();
                $employees = $employeeModel->findAll();
                for ($i = 0; $i < count($employees); $i++) {
                    if ($_POST['fullname'] == $employees[$i]['employee_name']) {
                        $_POST['project_owner_id'] = $employees[$i]['employee_id'];
                    }
                }
                $projectModel->save($_POST);
            } else {
                $data['validation'] = $this->validator;
            }
        }
        return view('canvas/add-projects', $data);
    }

    public function tasks() {
        $data = [
            'title' => 'Tasks'
        ];

        $projectModel = new ProjectModel();
        $teamModel = new TeamModel();
        $taskModel = new TaskModel();
        $data['projects']= [];
        $data['teams'] = [];
        $data['tasks'] = [];

        foreach ($projectModel->findAll() as $project) {
            $project_name = $project['project_title'];
            array_push($data['projects'], $project_name);
        }

        foreach ($teamModel->findAll() as $team) {
            $team_name = $team['team_name'];
            array_push($data['teams'], $team_name);
        }

        foreach($taskModel->findAll() as $task) {
            $task['project_name'] = $projectModel->where(['project_id' => $task['project_id']])->get()->getResult()[0]->project_title;
            array_push($data['tasks'], $task);
        }

        helper(['form']);

        if($this->request->getMethod() == 'post') {

            $rules = [
                'task_description' => [
                    'rules' => 'required',
                    'label' => 'Task'
                ],
                'project_id' => [
                    'rules' => 'required',
                    'label' => 'Project Name'
                ],
                'team_id' => [
                    'rules' => 'required',
                    'label' => 'Team Name'
                ]
            ];

            if($this->validate($rules)) {
                $_POST['project_id'] = (int)$projectModel->where(['project_title' => $_POST['project_id']])->get()->getResult()[0]->project_id;
                $_POST['team_id'] = (int)$teamModel->where(['team_name' => $_POST['team_id']])->get()->getResult()[0]->team_id;
                $_POST['task_status'] = 'Active';
                $taskModel->save($_POST);
                return redirect()->to('/dashboard/tasks');
            } else {
                $data['validation'] = $this->validator;
            }
        }

        return view('canvas/tasks', $data);
    }

    public function newEmployee() {
        $data = [
            'title' => 'Add Employee'
        ];

        if($this->request->getMethod() == 'post') {

            $rules = [
                'employee_name' => [
                    'rules' => 'required',
                    'label' => 'Employee name',
                    'error' => [
                        'required' => 'Enter Employee Name'
                    ]
                ],
                'employee_position' => [
                    'rules' => 'required',
                    'label' => 'Employee position',
                    'error' => [
                        'required' => 'Enter Employee Position'
                    ]
                ],
                'team_id' => [
                    'rules' => 'required',
                    'label' => 'Team name',
                    'error' => [
                        'required' => 'Enter Team'
                    ]
                ],
                'pay_scale' => [
                    'rules' => 'required',
                    'label' => 'Pay Scale',
                    'error' => [
                        'required' => 'Enter Pay Scale'
                    ]
                ],
                'pay_scale_measure' => [
                    'rules' => 'required',
                    'label' => 'Pay Scale',
                    'error' => [
                        'required' => 'Enter Pay Scale Measure'
                    ]
                ]
            ];

            if($this->validate($rules)) {
                $newEmployeeModel = new EmployeeModel();
                $teamModel = new TeamModel();
                $team = $teamModel->findAll();
                for ($i = 0; $i < count($team); $i++) {
                    if ($_POST['team_id'] == $team[$i]['team_name']) {
                        $_POST['team_id'] = $team[$i]['team_id'];
                    }
                }
                print_r($_POST);
                $newEmployeeModel->save($_POST);
            } else {
                $data['validation'] = $this->validator;
            }
        }
        return view('canvas/new-employee', $data);
    }

    public function employees() {
        $data = [
            'title' => 'Employees'
        ];

        $db = db_connect();
        $customModel = new CustomModel($db);

        $data['employees'] = $customModel->joinEmployeeTeamTable();
        return view('canvas/employees', $data);
    }

    public function toDoList() {
        $data = [
            'title' => 'To-Do List'
        ];

        $toDoListModel = new ToDoListModel();
        $data['list_items'] = $toDoListModel->where(['employee_id' => session()->get('id')])->get()->getResult();
        return view('canvas/to-do-list', $data);
    }

    public function addToDoList() {
        if($this->request->getMethod() == 'post') {
            $toDoListModel = new ToDoListModel();
            $_POST['employee_id'] = session()->get('id');
            $toDoListModel->save($_POST);
        }

        return redirect()->to('/dashboard/toDoList');
    }

    public function statusChangeToDoListItem($id) {
        $toDoListModel = new toDoListModel();
        $item = $toDoListModel->find($id);
        if($item) {
            if($item['item_status'] == 0)
                $item['item_status'] = 1;
            else
                $item['item_status'] = 0;
            $toDoListModel->save($item);
            return redirect()->to('/dashboard/toDoList');
        }
    }

    public function deleteToDoListItem($id) {
        $toDoListModel = new toDoListModel();
        $item = $toDoListModel->find($id);
        if($item) {
            $toDoListModel->delete($item);
            return redirect()->to('/dashboard/toDoList');
        }
    }

    public function userSettings() {
        $data = [
            'title' => 'User Settings'
        ];
        $db = db_connect();
        $customModel = new CustomModel($db);
        $userModel = new UserModel();

        helper(['form']);

        if($this->request->getMethod() == 'post') {
            $rules = [];

            if($this->request->getPost('password') != ''){
                $rules['password'] = 'required|min_length[8]|max_length[50]';
                $rules['password_confirm'] = 'matches[password]';
            }

            if ($this->validate($rules)) {
                $newData = [
                    'user_id' => (int)session()->get('id')
                ];
                if($this->request->getPost('password') != ''){
                    $newData['password'] = $this->request->getPost('password');
                }

                $userModel->whereIn('user_id', [$newData['user_id']])
                    ->set(['password' => $newData['password']])
                    ->update();

                session()->setFlashdata('success', 'Successfuly Updated');
            }else{
                $data['validation'] = $this->validator;
            }
        }

        return view('canvas/user-settings', $data);
    }

    public function logout() {
        session()->destroy();
        return redirect()->to('/');
    }
}
