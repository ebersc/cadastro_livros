<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class LivroAutorSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['livro_codl' => 1, 'autor_codau' => 1],
            ['livro_codl' => 2, 'autor_codau' => 2],
            ['livro_codl' => 2, 'autor_codau' => 1],
        ];

        $this->db->table('livro_autor')->insertBatch($data);
    }
}
