<?php

class Controller_Courses extends Controller_Template 
{
	public $template = 'superprotected';
	
	public function action_index()
	{
		$data['courses'] = Model_Course::find('all');
		$this->template->title = "Courses";
		$this->template->content = View::forge('courses/index', $data);
	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('Courses');

		if ( ! $data['course'] = Model_Course::find($id))
		{
			Session::set_flash('error', 'Could not find course #'.$id);
			Response::redirect('Courses');
		}

		$users = DB::query("SELECT * FROM courseusers INNER JOIN users ON courseusers.userid = users.id WHERE courseusers.courseid = $id")->execute()->as_array();
		$data["users"] = $users;

		$this->template->title = "Course";
		$this->template->content = View::forge('courses/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Course::validate('create');
			
			if (Input::post("description"))
			{
				$course = Model_Course::forge(array(
					'name' => Input::post('name'),
					'description' => Input::post('description'),
					'owner' => Input::post('owner'),
				));

				if ($course and $course->save())
				{
					foreach (Input::post('users') as $user => $value) 
					{
						$matchcard = Model_Courseuser::forge(array(
							'userid' => $value,
							'courseid' => $course->id
						));	

						$matchcard -> save();
					}

					Session::set_flash('success', 'Added course #'.$course->id.'.');

					Response::redirect('courses');
				}

				else
				{
					Session::set_flash('error', 'Could not save course.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$data["users"] = Model_User::find('all');

		$this->template->title = "Courses";
		$this->template->content = View::forge('courses/create', $data);

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('Courses');

		if ( ! $course = Model_Course::find($id))
		{
			Session::set_flash('error', 'Could not find course #'.$id);
			Response::redirect('Courses');
		}

		if (Input::post('description'))
		{
			$users = DB::query("SELECT userid FROM courseusers INNER JOIN users ON courseusers.userid = users.id WHERE courseusers.courseid = $id")->execute()->as_array();
			$newusers = Input::post('users'); 

			if($newusers != null)
			{
				foreach ($users as $user => $value) 
				{
					$value = $value["userid"];
					$delete = DB::query("DELETE FROM courseusers WHERE userid=$value AND courseid=$id")->execute();
				}

				foreach ($newusers as $newuser => $value) 
				{
					$courseuser = Model_Courseuser::forge(array(
						'userid' => $value,
						'courseid' => $id
					));	

					$courseuser -> save();
				}
			}

			$course->name = Input::post('name');
			$course->description = Input::post('description');
			$course->owner = Input::post('owner');

			if ($course->save())
			{
				Session::set_flash('success', 'Updated course #' . $id);

				Response::redirect('courses');
			}

			else
			{
				Session::set_flash('error', 'Could not update course #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				Session::set_flash('error', "error");
			}

			$this->template->set_global('course', $course, false);
		}

		$data["users"] = Model_User::find('all');

		$this->template->title = "Courses";
		$this->template->content = View::forge('courses/edit', $data);

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('Courses');

		if ($course = Model_Course::find($id))
		{
			$course->delete();

			$deleteusers = $delete = DB::query("DELETE FROM courseusers WHERE courseid=$id")->execute();

			Session::set_flash('success', 'Deleted course #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete course #'.$id);
		}

		Response::redirect('courses');

	}


}