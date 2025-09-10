<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AssuntoSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['descricao' => 'Ficção'],
            ['descricao' => 'Aventura'],
        ];

        $this->db->table('assunto')->insertBatch($data);
    }
}
