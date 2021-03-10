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
			'project_id'          => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => true,
			],
			'category_name'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '50'
			],
			'created_at' => [
				'type'           => 'DATETIME',
				'null'     		 => TRUE,
			],
			'updated_at' => [
				'type'           => 'DATETIME',
				'null'     		 => TRUE,
			],
			'deleted_at' => [
				'type' 			 => 'DATETIME',
				'null' 			 => TRUE,
			]
		]);

		// Membuat primary key
		$this->forge->addKey('id', TRUE);

		//fk
		$this->forge->addForeignKey('project_id', 'project', 'id');

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
