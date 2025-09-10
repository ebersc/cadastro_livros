<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAutor extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'codau' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nome' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
        ]);
        $this->forge->addKey('codau', true);
        $this->forge->createTable('autor');
    }

    public function down()
    {
        $this->forge->dropTable('autor');
    }
}
