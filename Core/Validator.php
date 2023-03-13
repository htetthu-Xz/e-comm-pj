<?php

namespace Core;

class Validator
{
    public static function string($value, $min = 1, $max = INF)
    {
        $value = trim($value);

        return strlen($value) >= $min && strlen($value) <= $max;
    }

    public static function email($value)
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }

    public static function password($value)
    {
        if(strlen($value) < 8){
            return true;
        } 
    }

    public static function phone($value)
    {
        return preg_match('/^[0-9]{11}+$/', $value);
    }

    public static function password_match($password, $confirm_password) {
        return $password === $confirm_password;
    }
}