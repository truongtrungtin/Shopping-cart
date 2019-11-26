<?php
class AuthenticationController extends BaseController {
    
    public function __CONSTRUCT (){}
    
    public function Index () {
        Security:: DeleteSession ();
        parent::RenderPage(
            'Authentication', 
            'view/login/layout.php', 
            'view/authentication/authentication.php'
        );
    }

    public function Login () {
        $model = new User($_REQUEST['username'], $_REQUEST['password']);
        $result = $model->Login();
        if ($result) {
            Security::CreateSessionForUser(User::GetUserById($result));
            parent::RedirectToController('home');
        } else {
            $model->setMessage('Invalid username / password!!!');
            parent::RenderPage(
                'Authentication', 
                'view/login/layout.php', 
                'view/authentication/authentication.php',
                $model
            );
        }
    }

    public function Register () {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = new User(
                $_REQUEST['username'], 
                $_REQUEST['password'],
                $_REQUEST['name'],
                $_REQUEST['lastName'],
                $_REQUEST['phone'],
                $_REQUEST['email'],
                $_REQUEST['role']
            );
            $user->Register();
            parent::RedirectToController('authentication');
        } else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            parent::RenderPage(
                'Authentication', 
                'view/login/layout.php', 
                'view/authentication/register.php'
            );
        }
    }

    public function Logout () {
        Security::DeleteSession();
        parent::RedirectToController('Authentication');
    }
}

?>