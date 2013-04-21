<?php
/**
 * Fuel is a fast, lightweight, community driven PHP5 framework.
 *
 * @package    Fuel
 * @version    1.5
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2013 Fuel Development Team
 * @link       http://fuelphp.com
 */

/**
 * The Welcome Controller.
 *
 * A basic controller example.  Has examples of how to set the
 * response body and status.
 *
 * @package  app
 * @extends  Controller
 */
class Controller_Welcome extends Controller_Template
{
	public $template = 'protected';
	
	/**
	 * The basic welcome message
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_index()
	{
		$role = Auth::instance()->get_groups();
		$role = $role[0][1];

		$id = Auth::instance()->get_user_id();
		$id = $id[1];

		$courses = DB::query("SELECT * FROM courseusers INNER JOIN courses on courseusers.courseid = courses.id WHERE courseusers.userid=$id")->execute()->as_array();

		$matches = array();

		foreach ($courses as $course => $value) 
		{
			$id = $value["id"];
			$matchquery = DB::query("SELECT * FROM matches WHERE course = $id")->execute()->as_array();
			array_push($matches, array(
				"id" => $id,
				"matches" => $matchquery
			));
		}
		
		$data["matches"] = $matches;
		$data["role"] = $role;
		
		$this->template->title = "Welcome";
		$this->template->content = View::forge('welcome/index', $data);
	}

	/**
	 * A typical "Hello, Bob!" type example.  This uses a ViewModel to
	 * show how to use them.
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_hello()
	{
		return Response::forge(ViewModel::forge('welcome/hello'));
	}

	/**
	 * The 404 action for the application.
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_404()
	{
		return Response::forge(ViewModel::forge('welcome/404'), 404);
	}
}
