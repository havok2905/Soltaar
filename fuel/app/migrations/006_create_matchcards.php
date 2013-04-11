<?php

namespace Fuel\Migrations;

class Create_matchcards
{
	public function up()
	{
		\DBUtil::create_table('matchcards', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'matchid' => array('constraint' => 11, 'type' => 'int'),
			'cardid' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('matchcards');
	}
}