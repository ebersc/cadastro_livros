<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateLivro extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'codl' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'titulo' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'editora' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'edicao' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],
            'anopublicacao' => [
                'type'       => 'INT',
                'constraint' => 4,
                'null'       => true,
            ],
            'valor' => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2',
                'default'    => 0.00,
            ],
        ]);
        $this->forge->addKey('codl', true);
        $this->forge->createTable('livro');
    }

    public function down()
    {
        $this->forge->dropTable('livro');
    }
}
