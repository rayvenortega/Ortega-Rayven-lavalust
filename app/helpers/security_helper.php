<?php

defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

if (!function_exists('filter_io')) {
    require_once SYSTEM_DIR . 'helpers/security_helper.php';
}

if (!function_exists('csrf_field')) {
    function csrf_field(): string
    {
        if (!function_exists('lava_instance')) {
            return '';
        }

        $lava = lava_instance();
        if (!$lava || !isset($lava->security)) {
            return '';
        }

        $token_name = method_exists($lava->security, 'get_csrf_token_name')
            ? $lava->security->get_csrf_token_name()
            : 'lava_csrf_token';

        $token_value = method_exists($lava->security, 'get_csrf_hash')
            ? $lava->security->get_csrf_hash()
            : '';

        return '<input type="hidden" name="' . htmlspecialchars($token_name, ENT_QUOTES, 'UTF-8') . '" value="' . htmlspecialchars($token_value, ENT_QUOTES, 'UTF-8') . '" />';
    }
}
