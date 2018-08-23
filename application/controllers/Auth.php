<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function index()
	{
		$this->template->render('auth/index');
	}

	public function login() {

		// POST
		if ($this->input->method() == 'post') {
			$data = $this->input->post();
			$this->load->model('auth_model');

			$valid = $this->auth_model->check($data['username'], $data['password']);

			if ($valid) {
				redirect('home');
			}
		}

		// GET
		$this->load->helper('form');
		$this->load->library('form_validation');
	
		$action = 'auth/login';

		$this->template->addStyle('login');
		$this->template->render('auth/login', array('action' => $action	));
	}

	public function logout() {
		$this->template->render('auth/logout');
	}
}
