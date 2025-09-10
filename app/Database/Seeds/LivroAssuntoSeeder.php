<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class LivroAssuntoSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['livro_codl' => 1, 'assunto_codas' => 1],
            ['livro_codl' => 1, 'assunto_codas' => 2],
            ['livro_codl' => 2, 'assunto_codas' => 1],
        ];

        $this->db->table('livro_assunto')->insertBatch($data);
    }
}
