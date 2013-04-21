<?php

namespace Fuel\Migrations;

class Create_courseusers
{
	public function up()
	{
		\DBUtil::create_table('courseusers', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'userid' => array('constraint' => 11, 'type' => 'int'),
			'courseid' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('courseusers');
	}
}