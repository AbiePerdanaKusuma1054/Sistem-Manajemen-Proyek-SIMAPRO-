<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Prevenues extends Migration
{
	public function up()
	{
		// Membuat kolom/field untuk tabel project revenues
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
			'prevenues_desc'      => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
			'prevenues_status'      => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
			'prevenues_amount'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
			'prevenues_date'      => [
				'type'           => 'DATE',
				'null'     		 => TRUE,
			],
		]);

		// Membuat primary key
		$this->forge->addKey('id', TRUE);

		//fk
		$this->forge->addForeignKey('project_id', 'project', 'id');

		// Membuat tabel project revenues
		$this->forge->createTable('prevenues', TRUE);
	}

	//-------------------------------------------------------

	public function down()
	{
		// menghapus tabel project revenues
		$this->forge->dropTable('prevenues');
	}
}
