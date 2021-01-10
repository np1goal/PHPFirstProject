<?php namespace App\Controllers;

use App\Models\UserModel;

class Login extends BaseController {

    public function index() {

        $data = [
            'title' => 'Login'
        ];

        helper(['form']);

        if($this->request->getMethod() == 'post') {
            $rules = [
                'email' => 'required|valid_email',
                'password' => [
                    'rules' => 'required|validateUser[email, password]',
                    'errors' => [
                        'validateUser' => 'Email or Password don\'t match'
                    ]
                ]
            ];

            if ($this->validate($rules)) {
                $userModel = new UserModel();
                $user = $userModel->where('email', $this->request->getVar('email'))->first();
                $this->setUserSession($user);
                return redirect()->to('/dashboard');
            } else {
                $data['validation'] = $this->validator;
            }
        }

        return view('login', $data);
    }

    public function setUserSession($user) {
        $data = [
            'id' => $user['user_id'],
            'fullname' => $user['fullname'],
            'email' => $user['email'],
            'isLoggedIn' => true
        ];

        session()->set($data);
        return true;
    }
}
