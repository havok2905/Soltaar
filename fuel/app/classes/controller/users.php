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
		$auth = Auth::instance();
		$view = View::forge('users/register');
		$form = Fieldset::forge('register');
		Model_User::register($form);

		if(Input::post())
		{
			$form -> repopulate();
			$result = Model_User::validate_registration($form, $auth);

			if($result['e_found'])
			{
				$view -> set('errors', $result['errors'], false);
			}
			else
	        {
	            Session::set_flash('success', 'User created.');
	            Response::redirect('./');
	        }
		}

		$view->set('reg', $form->build(), false);
		$this->template->title = 'User &raquo; Register';
		$this->template->content = $view;
	}

}
