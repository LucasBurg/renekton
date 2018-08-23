<?php
class Auth_hook {

    private $ci;

    private $routes_public = array(
        'auth/login',
    );

    public function __construct() {
        $this->ci =& get_instance();
    }

    public function check() 
    {
        $uri = $this->ci->router->fetch_class().'/'.$this->ci->router->fetch_method();

        if (!in_array($uri, $this->routes_public)) {
            if (empty($this->ci->session->userdata('username'))) {
                redirect(base_url('auth/login'));
            }
        }
    }
}