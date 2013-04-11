<?php
class Controller_Matches extends Controller_Template 
{

	public function action_index()
	{
		$data['matches'] = Model_Match::find('all');
		$this->template->title = "Matches";
		$this->template->content = View::forge('matches/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('Matches');

		if ( ! $data['match'] = Model_Match::find($id))
		{
			Session::set_flash('error', 'Could not find match #'.$id);
			Response::redirect('Matches');
		}

		$this->template->title = "Match";
		$this->template->content = View::forge('matches/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Match::validate('create');
			
			if ($val->run())
			{
				$match = Model_Match::forge(array(
					'time' => Input::post('time'),
					'score' => Input::post('score'),
					'owner' => Input::post('owner'),
				));

				if ($match and $match->save())
				{
					Session::set_flash('success', 'Added match #'.$match->id.'.');

					Response::redirect('matches');
				}

				else
				{
					Session::set_flash('error', 'Could not save match.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Matches";
		$this->template->content = View::forge('matches/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('Matches');

		if ( ! $match = Model_Match::find($id))
		{
			Session::set_flash('error', 'Could not find match #'.$id);
			Response::redirect('Matches');
		}

		$val = Model_Match::validate('edit');

		if ($val->run())
		{
			$match->time = Input::post('time');
			$match->score = Input::post('score');
			$match->owner = Input::post('owner');

			if ($match->save())
			{
				Session::set_flash('success', 'Updated match #' . $id);

				Response::redirect('matches');
			}

			else
			{
				Session::set_flash('error', 'Could not update match #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$match->time = $val->validated('time');
				$match->score = $val->validated('score');
				$match->owner = $val->validated('owner');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('match', $match, false);
		}

		$this->template->title = "Matches";
		$this->template->content = View::forge('matches/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('Matches');

		if ($match = Model_Match::find($id))
		{
			$match->delete();

			Session::set_flash('success', 'Deleted match #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete match #'.$id);
		}

		Response::redirect('matches');

	}

	// OUR CONTROLLER FOR BRINGING UP A MATCH
	public function action_play($id = null)
	{
		is_null($id) and Response::redirect('Matches');
		
		if ( ! $data['match'] = Model_Match::find($id))
		{
			Session::set_flash('error', 'Could not find match #'.$id);
			Response::redirect('Matches');
		}

		$this->template->title = "Match";
		$this->template->content = View::forge('matches/play', $data);
	}
}