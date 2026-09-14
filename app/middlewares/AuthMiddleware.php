<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class AuthMiddleware
{
    public function handle($next)
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (empty($_SESSION['user_id'])) {
            $_SESSION['auth_error'] = 'Please log in to access this page.';
            header('Location: ' . site_url('login'));
            exit;
        }

        return $next();
    }
}
