<?php

class Controller_Courses extends Controller_Template 
{
	public $template = 'protected';
	
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

		$this->template->title = "Course";
		$this->template->content = View::forge('courses/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Course::validate('create');
			
			if ($val->run())
			{
				$course = Model_Course::forge(array(
					'name' => Input::post('name'),
					'description' => Input::post('description'),
					'owner' => Input::post('owner'),
				));

				if ($course and $course->save())
				{
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

		$this->template->title = "Courses";
		$this->template->content = View::forge('courses/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('Courses');

		if ( ! $course = Model_Course::find($id))
		{
			Session::set_flash('error', 'Could not find course #'.$id);
			Response::redirect('Courses');
		}

		$val = Model_Course::validate('edit');

		if ($val->run())
		{
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
				$course->name = $val->validated('name');
				$course->description = $val->validated('description');
				$course->owner = $val->validated('owner');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('course', $course, false);
		}

		$this->template->title = "Courses";
		$this->template->content = View::forge('courses/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('Courses');

		if ($course = Model_Course::find($id))
		{
			$course->delete();

			Session::set_flash('success', 'Deleted course #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete course #'.$id);
		}

		Response::redirect('courses');

	}


}