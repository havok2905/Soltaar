<?php
use Orm\Model;

class Model_Coursecard extends Model
{
	protected static $_properties = array(
		'id',
		'cardid',
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
		$val->add_field('cardid', 'Cardid', 'required|valid_string[numeric]');
		$val->add_field('courseid', 'Courseid', 'required|valid_string[numeric]');

		return $val;
	}

}
