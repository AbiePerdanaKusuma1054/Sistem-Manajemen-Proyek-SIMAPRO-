<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Employee extends Migration
{
	public function up()
	{
		// Membuat kolom/field untuk tabel employee
		$this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => true,
				'auto_increment' => true
			],
			'employee_name'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '50'
			],
			'employee_email'      => [
				'type'           => 'VARCHAR',
				'constraint'     => '50'
			],
			'employee_gender' => [
				'type'           => 'VARCHAR',
				'constraint'     => '10'
			],
			'employee_address'      => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
		]);

		// Membuat primary key
		$this->forge->addKey('id', TRUE);

		// Membuat tabel employee
		$this->forge->createTable('employee', TRUE);
	}

	//-------------------------------------------------------

	public function down()
	{
		// menghapus tabel employee
		$this->forge->dropTable('employee');
	}
}
