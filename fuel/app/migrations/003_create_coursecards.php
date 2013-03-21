<?php

namespace Fuel\Migrations;

class Create_coursecards
{
	public function up()
	{
		\DBUtil::create_table('coursecards', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'cardid' => array('constraint' => 11, 'type' => 'int'),
			'courseid' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('coursecards');
	}
}