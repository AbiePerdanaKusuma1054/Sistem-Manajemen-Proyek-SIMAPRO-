<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pteam extends Migration
{
	public function up()
	{
		// Membuat kolom/field untuk tabel pteam
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
			'employee_id'          => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => true,
			],
			'position_id'          => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => true,
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
		$this->forge->addForeignKey('employee_id', 'employee', 'id');
		$this->forge->addForeignKey('position_id', 'position', 'id');

		// Membuat tabel project
		$this->forge->createTable('pteam', TRUE);
	}

	//-------------------------------------------------------

	public function down()
	{
		// menghapus tabel project
		$this->forge->dropTable('pteam');
	}
}
