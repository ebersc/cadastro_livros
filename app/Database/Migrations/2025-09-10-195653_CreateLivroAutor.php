<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateLivroAutor extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'livro_codl' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'autor_codau' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
        ]);
        $this->forge->addForeignKey('livro_codl', 'livro', 'codl', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('autor_codau', 'autor', 'codau', 'CASCADE', 'CASCADE');
        $this->forge->createTable('livro_autor');
    }

    public function down()
    {
        $this->forge->dropTable('livro_autor');
    }
}
