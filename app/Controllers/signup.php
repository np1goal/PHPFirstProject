<?php namespace App\Controllers;

use App\Models\UserModel;

class Signup extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'SignUp'
        ];

        helper(['form']);

        $userModel = new UserModel();

        if($this->request->getMethod() == 'post') {
            $rules = [
                'fullname' => [
                    'rules'=> 'required|checkEmployeeExists[fullname]',
                    'errors' => [
                        'checkUserExists' => 'Employee does not exist. Contact your manager.'
                    ]
                ],
                'email' => 'required|valid_email|min_length[6]|max_length[50]|is_unique[user.email]',
                'password' => 'required|min_length[8]|max_length[50]',
                'reenter-password' => 'required|matches[password]'
            ];

            if ($this->validate($rules)) {
                $userModel->save($_POST);
                $session = session();
                $session->setFlashdata('success', 'Successful Registeration');
                return redirect()->to('/login');
            } else {
                $data['validation'] = $this->validator;
            }
        }

        return view('signup', $data);
    }
}