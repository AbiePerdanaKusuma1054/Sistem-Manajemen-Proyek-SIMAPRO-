<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CostCategory extends Migration
{
	public function up()
	{
		// Membuat kolom/field untuk tabel cost category
		$this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => true,
				'auto_increment' => true
			],
			'pcost_id'          => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => true,
			],
			'category_name'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
		]);

		// Membuat primary key
		$this->forge->addKey('id', TRUE);

		//fk
		$this->forge->addForeignKey('pcost_id', 'pcost', 'id');

		// Membuat tabel cost category
		$this->forge->createTable('cost_category', TRUE);
	}

	//-------------------------------------------------------

	public function down()
	{
		// menghapus tabel cost category
		$this->forge->dropTable('cost_category');
	}
}