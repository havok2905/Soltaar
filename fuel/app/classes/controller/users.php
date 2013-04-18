<?php

class Controller_Users extends Controller_Template
{
	public function action_index()
	{
		$data['users'] = Model_User::find('all');
		$this->template->title = "Users";
		$this->template->content = View::forge('users/index', $data);
	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('Users');

		if ( ! $data['user'] = Model_User::find($id))
		{
			Session::set_flash('error', 'Could not find user #'.$id);
			Response::redirect('Users');
		}

		$this->template->title = "User";
		$this->template->content = View::forge('users/view', $data);

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('Users');

		if ( ! $user = Model_User::find($id))
		{
			Session::set_flash('error', 'Could not find user #'.$id);
			Response::redirect('Users');
		}

		$val = Model_User::validate('edit');

		if ($val->run())
		{
			$user->username = Input::post('username');
			$user->group = Input::post('group');
			$user->email = Input::post('email');

			if ($user->save())
			{
				Session::set_flash('success', 'Updated user #' . $id);

				Response::redirect('users');
			}

			else
			{
				Session::set_flash('error', 'Could not update user #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$user-> username = $val->validated('username');
				$user-> group = $val->validated('group');
				$user-> email = $val->validated('email');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('user', $user, false);
		}

		$this->template->title = "Users";
		$this->template->content = View::forge('users/edit');

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

	public function action_login()
	{
		$view = View::forge('users/login');
		$form = Form::forge('login');
		$auth = Auth::instance();

		$form->add('username', 'Username:');
		$form->add('password', 'Password:', array('type'=>'password'));
		$form->add('submit', ' ', array('type'=>'submit', 'value'=>'login'));

		if(Input::post())
		{
			if($auth->login(Input::post('username'), Input::post('password')))
			{
				Session::set_flash('success', 'Successfully logged in! Welcome '.$auth->get_screen_name());
				Response::redirect('matches/');
			}
			else
			{
				Session::set_flash('error', 'Username or password incorrect.');				
			}
		}
		else
		{
			Session::set_flash('error', 'Username or password incorrect.');
		}


		$view->set('form', $form, false);
		$this->template->title = 'User &raquo; Login';
		$this->template->content = $view;
	}

	public function action_logout()
	{
		$auth = Auth::instance();
		$auth->logout();
		Session::set_flash('success', 'Logged out.');
		Response::redirect('matches/');
	}
}


