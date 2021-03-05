<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pcost extends Migration
{
	public function up()
	{
		// Membuat kolom/field untuk tabel project cost
		$this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => true,
				'auto_increment' => true
			],
			'category_id'          => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => true,
			],
			'pcost_amount'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
			'pcost_quantity'      => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
			'pcost_unit' => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
			'pcost_duration'      => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
			'pcost_unit_duration'      => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
			'pcost_date'      => [
				'type'           => 'DATE',
				'null'     		 => TRUE,
			],
		]);

		// Membuat primary key
		$this->forge->addKey('id', TRUE);

	

		// Membuat tabel pcost
		$this->forge->createTable('pcost', TRUE);
	}

	//-------------------------------------------------------

	public function down()
	{
		// menghapus tabel project cost
		$this->forge->dropTable('pcost');
	}
}
