<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class StudentMiddleware
{
    public function handle($next)
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $hasPass = !empty($_SESSION['student_profile_pass']);
        $issuedAt = $_SESSION['student_profile_pass_time'] ?? 0;
        $isFresh = $issuedAt > 0 && (time() - $issuedAt) <= 30;

        if (!$hasPass || !$isFresh) {

            unset(
                $_SESSION['student_profile_pass'],
                $_SESSION['student_profile_pass_time']
            );

            $_SESSION['student_notice'] =
                'VioletGuard Access Denied: Please open your protected profile from the Student Home page first.';

            header('Location: ' . site_url('student'));
            exit;
        }

        // One-time VioletGuard access
        unset(
            $_SESSION['student_profile_pass'],
            $_SESSION['student_profile_pass_time']
        );

        $_SESSION['middleware_message'] =
            'VioletGuard Access: Your Student Profile has been securely verified.';

        return $next();
    }
}
?>
