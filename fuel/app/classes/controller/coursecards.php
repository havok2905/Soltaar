<?php
class Controller_Coursecards extends Controller_Template 
{

	public function action_index()
	{
		$data['coursecards'] = Model_Coursecard::find('all');
		$this->template->title = "Coursecards";
		$this->template->content = View::forge('coursecards/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('Coursecards');

		if ( ! $data['coursecard'] = Model_Coursecard::find($id))
		{
			Session::set_flash('error', 'Could not find coursecard #'.$id);
			Response::redirect('Coursecards');
		}

		$this->template->title = "Coursecard";
		$this->template->content = View::forge('coursecards/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Coursecard::validate('create');
			
			if ($val->run())
			{
				$coursecard = Model_Coursecard::forge(array(
					'cardid' => Input::post('cardid'),
					'courseid' => Input::post('courseid'),
				));

				if ($coursecard and $coursecard->save())
				{
					Session::set_flash('success', 'Added coursecard #'.$coursecard->id.'.');

					Response::redirect('coursecards');
				}

				else
				{
					Session::set_flash('error', 'Could not save coursecard.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Coursecards";
		$this->template->content = View::forge('coursecards/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('Coursecards');

		if ( ! $coursecard = Model_Coursecard::find($id))
		{
			Session::set_flash('error', 'Could not find coursecard #'.$id);
			Response::redirect('Coursecards');
		}

		$val = Model_Coursecard::validate('edit');

		if ($val->run())
		{
			$coursecard->cardid = Input::post('cardid');
			$coursecard->courseid = Input::post('courseid');

			if ($coursecard->save())
			{
				Session::set_flash('success', 'Updated coursecard #' . $id);

				Response::redirect('coursecards');
			}

			else
			{
				Session::set_flash('error', 'Could not update coursecard #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$coursecard->cardid = $val->validated('cardid');
				$coursecard->courseid = $val->validated('courseid');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('coursecard', $coursecard, false);
		}

		$this->template->title = "Coursecards";
		$this->template->content = View::forge('coursecards/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('Coursecards');

		if ($coursecard = Model_Coursecard::find($id))
		{
			$coursecard->delete();

			Session::set_flash('success', 'Deleted coursecard #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete coursecard #'.$id);
		}

		Response::redirect('coursecards');

	}


}