<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateLivroAssunto extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'livro_codl' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'assunto_codas' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
        ]);
        $this->forge->addForeignKey('livro_codl', 'livro', 'codl', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('assunto_codas', 'assunto', 'codas', 'CASCADE', 'CASCADE');
        $this->forge->createTable('livro_assunto');
    }

    public function down()
    {
        $this->forge->dropTable('livro_assunto');
    }
}
