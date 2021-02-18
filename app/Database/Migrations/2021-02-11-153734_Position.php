<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Position extends Migration
{
	public function up()
	{
		// Membuat kolom/field untuk tabel position
		$this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => true,
				'auto_increment' => true
			],
			'position_name'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '50'
			],
			'position_desc'      => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
		]);

		// Membuat primary key
		$this->forge->addKey('id', TRUE);

		// Membuat tabel position
		$this->forge->createTable('position', TRUE);
	}

	//-------------------------------------------------------

	public function down()
	{
		// menghapus tabel position
		$this->forge->dropTable('position');
	}
}
