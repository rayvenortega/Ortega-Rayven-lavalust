<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class AuthController extends Controller {
    public function __construct()
    {
        parent::__construct();
        $this->db = $this->call->database();
        $this->form_validation = $this->call->library('form_validation');
        $this->call->helper('security');
        $this->AuthModel = $this->call->model('AuthModel');
    }

    public function index()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!empty($_SESSION['user_id'])) {
            redirect('products');
            return;
        }

        redirect('login');
    }

    public function login()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!empty($_SESSION['user_id'])) {
            redirect('products');
            return;
        }

        $data['error'] = $_SESSION['auth_error'] ?? '';
        unset($_SESSION['auth_error']);

        $this->call->view('auth/login', $data);
    }

    public function authenticate()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $username = trim(strip_tags((string) filter_io('string', $_POST['username'] ?? '')));
        $password = (string) ($_POST['password'] ?? '');

        $this->form_validation->name('username')->required()->min_length(3)->max_length(50)->alpha_numeric_dash();
        $this->form_validation->name('password')->required()->min_length(6)->max_length(255);

        if (!$this->form_validation->run()) {
            $_SESSION['auth_error'] = implode('<br>', $this->form_validation->get_errors());
            redirect('login');
            return;
        }

        $user = $this->AuthModel->find_by_username($username);

        if (!$user || !$this->AuthModel->verify_password($password, $user['password'] ?? '')) {
            $_SESSION['auth_error'] = 'Invalid username or password.';
            redirect('login');
            return;
        }

        if (!empty($user['isActive']) && (int) $user['isActive'] === 0) {
            $_SESSION['auth_error'] = 'This account is inactive.';
            redirect('login');
            return;
        }

        $_SESSION['user_id'] = (int) $user['id'];
        $_SESSION['username'] = $user['username'];
        unset($_SESSION['auth_error']);

        redirect('products');
    }

    public function logout()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $_SESSION = [];
        session_destroy();

        redirect('login');
    }
}