<?php
class Auth_model extends CI_Model {
    public function check(string $email, string $password) {
        return ($email == 'lucasburgmota@gmail.com' && $password == '1234');
    } 
}