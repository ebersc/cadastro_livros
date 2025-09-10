<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AutorSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['nome' => 'Autor 1'],
            ['nome' => 'Autor 2'],
        ];

        $this->db->table('autor')->insertBatch($data);
    }
}
