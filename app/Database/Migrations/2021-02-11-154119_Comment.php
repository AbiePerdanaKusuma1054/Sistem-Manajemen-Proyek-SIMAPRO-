<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Comment extends Migration
{
	public function up()
	{
		// Membuat kolom/field untuk tabel comment
		$this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => true,
				'auto_increment' => true
			],
			'user_id'          => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => true,
			],
			'project_id'       => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => true,
			],
			'comment_text'      => [
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

		//fk
		$this->forge->addForeignKey('user_id', 'user', 'id');
		$this->forge->addForeignKey('project_id', 'project', 'id');

		// Membuat tabel comment
		$this->forge->createTable('comment', TRUE);
	}

	//-------------------------------------------------------

	public function down()
	{
		// menghapus tabel comment
		$this->forge->dropTable('comment');
	}
}
