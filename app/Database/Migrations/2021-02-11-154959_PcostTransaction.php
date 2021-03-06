<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PcostTransaction extends Migration
{
	public function up()
	{
		// Membuat kolom/field untuk tabel project cost transaction
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
			'cost_item' => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
			'cost_amount'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
			'cost_status'      => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
			'cost_date'      => [
				'type'           => 'DATE',
				'null'     		 => TRUE,
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
		$this->forge->addForeignKey('pcost_id', 'pcost', 'id');

		// Membuat tabel project cost transaction
		$this->forge->createTable('pcost_transaction', TRUE);
	}

	//-------------------------------------------------------

	public function down()
	{
		// menghapus tabel project cost transaction
		$this->forge->dropTable('pcost_transaction');
	}
}
