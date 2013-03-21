<?php

namespace Fuel\Migrations;

class Create_matches
{
	public function up()
	{
		\DBUtil::create_table('matches', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'time' => array('constraint' => 11, 'type' => 'int'),
			'score' => array('constraint' => 11, 'type' => 'int'),
			'owner' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('matches');
	}
}