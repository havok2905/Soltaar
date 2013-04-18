<?php

class Controller_Matchcards extends Controller_Template 
{
	public $template = 'protected';
	
	public function action_index()
	{
		$data['matchcards'] = Model_Matchcard::find('all');
		$this->template->title = "Matchcards";
		$this->template->content = View::forge('matchcards/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('Matchcards');

		if ( ! $data['matchcard'] = Model_Matchcard::find($id))
		{
			Session::set_flash('error', 'Could not find matchcard #'.$id);
			Response::redirect('Matchcards');
		}

		$this->template->title = "Matchcard";
		$this->template->content = View::forge('matchcards/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Matchcard::validate('create');
			
			if ($val->run())
			{
				$matchcard = Model_Matchcard::forge(array(
					'matchid' => Input::post('matchid'),
					'cardid' => Input::post('cardid'),
				));

				if ($matchcard and $matchcard->save())
				{
					Session::set_flash('success', 'Added matchcard #'.$matchcard->id.'.');

					Response::redirect('matchcards');
				}

				else
				{
					Session::set_flash('error', 'Could not save matchcard.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Matchcards";
		$this->template->content = View::forge('matchcards/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('Matchcards');

		if ( ! $matchcard = Model_Matchcard::find($id))
		{
			Session::set_flash('error', 'Could not find matchcard #'.$id);
			Response::redirect('Matchcards');
		}

		$val = Model_Matchcard::validate('edit');

		if ($val->run())
		{
			$matchcard->matchid = Input::post('matchid');
			$matchcard->cardid = Input::post('cardid');

			if ($matchcard->save())
			{
				Session::set_flash('success', 'Updated matchcard #' . $id);

				Response::redirect('matchcards');
			}

			else
			{
				Session::set_flash('error', 'Could not update matchcard #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$matchcard->matchid = $val->validated('matchid');
				$matchcard->cardid = $val->validated('cardid');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('matchcard', $matchcard, false);
		}

		$this->template->title = "Matchcards";
		$this->template->content = View::forge('matchcards/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('Matchcards');

		if ($matchcard = Model_Matchcard::find($id))
		{
			$matchcard->delete();

			Session::set_flash('success', 'Deleted matchcard #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete matchcard #'.$id);
		}

		Response::redirect('matchcards');

	}
}