<?php
/**
 * Created by PhpStorm.
 * User: Wilfried
 * Date: 26/04/2017
 * Time: 16:11
 */

namespace macis\classes;

class Users
{

    public static function login($username, $password){
        return \Models\Users::getByUsername($username, $password);
    }
}
