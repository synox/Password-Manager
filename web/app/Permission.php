<?php


namespace PasswordManager;


class Permission
{
    public static function isLoggedIn()
    {
        return isset($_SESSION['pm.user_id']) && !is_null($_SESSION['pm.user_id']);
    }

    public static function getUserid()
    {
        if (isset($_SESSION['pm.user_id'])) {
            return $_SESSION['pm.user_id'];
        } else {
            return null;
        }

    }

    public static function setPassword($password)
    {
        $_SESSION['pm.password'] = $password;
    }
   public static function setUsername($username)
    {
        $_SESSION['pm.username'] = $username;
    }

    public static function setUserid($user_id)
    {
        $_SESSION['pm.user_id'] = $user_id;
    }

    public static function getPassword()
    {
        if (isset($_SESSION['pm.password'])) {
            return $_SESSION['pm.password'];
        } else {
            return null;
        }
    }

    public static function getUsername() {
        if (isset($_SESSION['pm.username'])) {
            return $_SESSION['pm.username'];
        } else {
            return null;
        }
    }

} 