<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class StudentController extends Controller
{
    private function studentData()
    {
        return [
            'title'      => 'Student Portal',
            'student_id' => 'MCC2024-00187',
            'name'       => 'Ray Ven L. Ortega',
            'course'     => 'BS Information Technology',
            'year'       => '3rd Year',
            'section'    => '3-F4',
            'email'      => 'rayvenortega4@gmail.com',
            'address'    => 'Catiningan Socorro Oriental Mindoro',
            'contact'    => '09670032681',
            'hobbies'    => 'Reading Yaoi Manga',
            'facebook'   => 'https://www.facebook.com/share/1Zk1abCgCs/'
        ];
    }

    public function index()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Going to Home alone does not unlock the protected profile.
        $data = $this->studentData();
        $data['notice'] = $_SESSION['student_notice'] ?? null;
        unset($_SESSION['student_notice']);

        $this->call->view('student/home', $data);
    }

    public function openProfile()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Same functional flow as the reference LAVALUST:
        // clicking Open Protected Profile gives a short-lived one-time pass.
        $_SESSION['student_profile_pass'] = bin2hex(random_bytes(16));
        $_SESSION['student_profile_pass_time'] = time();

        header('Location: ' . site_url('student/profile'));
        exit;
    }

    public function profile()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $data = $this->studentData();
        $data['title'] = 'Student Profile';
        $data['middleware_message'] =
            $_SESSION['middleware_message'] ?? 'Access verified by StudentMiddleware.';
        unset($_SESSION['middleware_message']);

        $this->call->view('student/profile', $data);
    }
}
?>
