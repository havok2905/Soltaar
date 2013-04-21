<?php
class Controller_Courseusers extends Controller_Template 
{
	public $template = 'superprotected';
	
	public function action_index()
	{
		$data['courseusers'] = Model_Courseuser::find('all');
		$this->template->title = "Courseusers";
		$this->template->content = View::forge('courseusers/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('Courseusers');

		if ( ! $data['courseuser'] = Model_Courseuser::find($id))
		{
			Session::set_flash('error', 'Could not find courseuser #'.$id);
			Response::redirect('Courseusers');
		}

		$this->template->title = "Courseuser";
		$this->template->content = View::forge('courseusers/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Courseuser::validate('create');
			
			if ($val->run())
			{
				$courseuser = Model_Courseuser::forge(array(
					'userid' => Input::post('userid'),
					'courseid' => Input::post('courseid'),
				));

				if ($courseuser and $courseuser->save())
				{
					Session::set_flash('success', 'Added courseuser #'.$courseuser->id.'.');

					Response::redirect('courseusers');
				}

				else
				{
					Session::set_flash('error', 'Could not save courseuser.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Courseusers";
		$this->template->content = View::forge('courseusers/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('Courseusers');

		if ( ! $courseuser = Model_Courseuser::find($id))
		{
			Session::set_flash('error', 'Could not find courseuser #'.$id);
			Response::redirect('Courseusers');
		}

		$val = Model_Courseuser::validate('edit');

		if ($val->run())
		{
			$courseuser->userid = Input::post('userid');
			$courseuser->courseid = Input::post('courseid');

			if ($courseuser->save())
			{
				Session::set_flash('success', 'Updated courseuser #' . $id);

				Response::redirect('courseusers');
			}

			else
			{
				Session::set_flash('error', 'Could not update courseuser #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$courseuser->userid = $val->validated('userid');
				$courseuser->courseid = $val->validated('courseid');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('courseuser', $courseuser, false);
		}

		$this->template->title = "Courseusers";
		$this->template->content = View::forge('courseusers/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('Courseusers');

		if ($courseuser = Model_Courseuser::find($id))
		{
			$courseuser->delete();

			Session::set_flash('success', 'Deleted courseuser #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete courseuser #'.$id);
		}

		Response::redirect('courseusers');

	}


}