<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class AuthModel extends Model {
    protected $table = 'login';
    protected $primary_key = 'id';
    protected $fillable = ['username', 'password', 'isActive'];
    protected $guarded = ['id'];

    public function __construct()
    {
        parent::__construct();
    }

    public function find_by_username($username)
    {
        $user = $this->db
            ->table($this->table)
            ->where('username', $username)
            ->get();

        if ($user) {
            return $user;
        }

        if ($this->table !== 'users') {
            return $this->db
                ->table('users')
                ->where('username', $username)
                ->get();
        }

        return null;
    }

    public function verify_password($inputPassword, $storedPassword)
    {
        $inputPassword = (string) $inputPassword;
        $storedPassword = (string) $storedPassword;

        if ($inputPassword === '' && $storedPassword === '') {
            return true;
        }

        if ($storedPassword !== '' && password_get_info($storedPassword)['algo'] !== false) {
            return password_verify($inputPassword, $storedPassword);
        }

        return hash_equals($storedPassword, $inputPassword);
    }
}