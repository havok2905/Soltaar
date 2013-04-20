<?php
class Controller_Matches extends Controller_Template 
{

	public $template = 'protected';

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

		$cards = DB::query("SELECT * FROM matchcards INNER JOIN cards ON matchcards.cardid = cards.id WHERE matchcards.matchid = $id")->execute()->as_array();
		$data["cards"] = $cards;

		$this->template->title = "Match";
		$this->template->content = View::forge('matches/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{	
			if (Input::post('score'))
			{
				$match = Model_Match::forge(array(
					'time' => Input::post('time'),
					'score' => Input::post('score'),
					'owner' => Input::post('owner'),
					'name' => Input::post('name'),
					'description' => Input::post('description'),
				));

				if ($match and $match->save())
				{
					foreach (Input::post('cards') as $card => $value) 
					{
						$matchcard = Model_Matchcard::forge(array(
							'cardid' => $value,
							'matchid' => $match->id
						));	

						$matchcard -> save();
					}

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
				Session::set_flash('error', "error");
			}
		}

		$data["cards"] = Model_Card::find('all');
		$this->template->title = "Matches";
		$this->template->content = View::forge('matches/create', $data);

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('Matches');

		if ( ! $match = Model_Match::find($id))
		{
			Session::set_flash('error', 'Could not find match #'.$id);
			Response::redirect('Matches');
		}

		if (Input::post('score'))
		{
			$cards = DB::query("SELECT cardid FROM matchcards INNER JOIN cards ON matchcards.cardid = cards.id WHERE matchcards.matchid = $id")->execute()->as_array();
			$newcards = Input::post('cards'); 

			if($newcards != null)
			{
				foreach ($cards as $card => $value) 
				{
					$value = $value["cardid"];
					$delete = DB::query("DELETE FROM matchcards WHERE cardid=$value AND matchid=$id")->execute();
				}

				foreach ($newcards as $newcard => $value) 
				{
					$matchcard = Model_Matchcard::forge(array(
						'cardid' => $value,
						'matchid' => $id
					));	

					$matchcard -> save();
				}
			}
			

			

			$match->time = Input::post('time');
			$match->score = Input::post('score');
			$match->owner = Input::post('owner');
			$match->name = Input::post('name');
			$match->description = Input::post('description');

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
				$match->name = $val->validated('name');
				$match->description = $val->validated('description');

				Session::set_flash('error', "error");
			}

			$this->template->set_global('match', $match, false);
		}

		$data["cards"] = Model_Card::find('all');

		$this->template->title = "Matches";
		$this->template->content = View::forge('matches/edit', $data);

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

		$match = DB::select()->from('matches')->where('id', $id)->execute();
		$user = DB::select('username')->from('users')->where('id', $match[0]['owner']);

		$data['user'] = $user;
		$data['match'] = $match;

		$this->template->title = "Match";
		$this->template->content = View::forge('matches/play', $data);
	}
}