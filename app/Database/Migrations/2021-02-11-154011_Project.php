<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Project extends Migration
{
	public function up()
	{
		// Membuat kolom/field untuk tabel project
		$this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => true,
				'auto_increment' => true
			],
			'client_id'          => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => true,
			],
			'project_name'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '50'
			],
			'project_start'      => [
				'type'           => 'DATE',
				'null'     		 => TRUE,
			],
			'project_finish' => [
				'type'           => 'DATE',
				'null'     		 => TRUE,
			],
			'project_desc'      => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
			'project_manager'      => [
				'type'           => 'VARCHAR',
				'constraint'     => '50'
			],
			'project_status'      => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
		]);

		// Membuat primary key
		$this->forge->addKey('id', TRUE);

		//fk
		$this->forge->addForeignKey('client_id', 'client', 'id');

		// Membuat tabel project
		$this->forge->createTable('project', TRUE);
	}

	//-------------------------------------------------------

	public function down()
	{
		// menghapus tabel project
		$this->forge->dropTable('project');
	}
}
