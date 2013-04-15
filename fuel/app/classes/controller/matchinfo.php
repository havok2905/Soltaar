<?php

class Controller_Matchinfo extends Controller_Rest
{

    public function get_match()
    {

    	is_null(Input::get('id')) and Response::redirect('Matches');

    	$id = Input::get('id');

    	$match = DB::select()->from('matches')->where('id', $id)->execute()->as_array();
		$cards = DB::query("SELECT * FROM matchcards INNER JOIN cards ON matchcards.cardid = cards.id WHERE matchcards.matchid = $id")->execute()->as_array();

        return $this->response(array("match" => $match, "cards" => $cards));
    }
}

?>