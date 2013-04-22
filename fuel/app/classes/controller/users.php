<?php

class Controller_Users extends Controller_Template
{
	public $template = 'superprotected';
	
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

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('Users');

		if ($user = Model_User::find($id))
		{
			$user->delete();
			Session::set_flash('success', 'Deleted user #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete user #'.$id);
		}

		Response::redirect('users');

	}
}


