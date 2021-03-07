<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Client extends Migration
{
	public function up()
	{
		// Membuat kolom/field untuk tabel client
		$this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => true,
				'auto_increment' => true
			],
			'client_name'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
			'client_email'      => [
				'type'           => 'VARCHAR',
				'constraint'     => '50'
			],
			'client_address'      => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
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

		// Membuat tabel client
		$this->forge->createTable('client', TRUE);
	}

	//-------------------------------------------------------

	public function down()
	{
		// menghapus tabel client
		$this->forge->dropTable('client');
	}
}
