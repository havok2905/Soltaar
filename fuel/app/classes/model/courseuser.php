<?php
use Orm\Model;

class Model_Courseuser extends Model
{
	protected static $_properties = array(
		'id',
		'userid',
		'courseid',
		'created_at',
		'updated_at',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_save'),
			'mysql_timestamp' => false,
		),
	);

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('userid', 'Userid', 'required|valid_string[numeric]');
		$val->add_field('courseid', 'Courseid', 'required|valid_string[numeric]');

		return $val;
	}

}
