<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAssunto extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'codas' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'descricao' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
        ]);
        $this->forge->addKey('codas', true);
        $this->forge->createTable('assunto');
    }

    public function down()
    {
        $this->forge->dropTable('assunto');
    }
}
