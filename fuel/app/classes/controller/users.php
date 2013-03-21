<?php

class Controller_Users extends Controller_Template
{

	public function action_login()
	{
		$this->template->title = 'Users &raquo; Login';
		$this->template->content = View::forge('users/login');
	}

	public function action_logout()
	{
		$this->template->title = 'Users &raquo; Logout';
		$this->template->content = View::forge('users/logout');
	}

	public function action_register()
	{
		$this->template->title = 'Users &raquo; Register';
		$this->template->content = View::forge('users/register');
	}

}
