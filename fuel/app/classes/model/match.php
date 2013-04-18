<?php
use Orm\Model;

class Model_Match extends Model
{
	protected static $_properties = array(
		'id',
		'time',
		'score',
		'owner',
		'name',
		'description',
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
		$val->add_field('time', 'Time', 'required|valid_string[numeric]');
		$val->add_field('score', 'Score', 'required|valid_string[numeric]');
		$val->add_field('owner', 'Owner', 'required|valid_string[numeric]');
		$val->add_field('name', 'Name', 'required|valid_string');
		$val->add_field('description', 'Description', '');
		return $val;
	}

}
