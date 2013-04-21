<?php

class Controller_Play extends Controller_Template
{
	public $template = 'protected';

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
