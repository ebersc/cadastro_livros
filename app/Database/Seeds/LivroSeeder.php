<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class LivroSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'titulo' => 'Guia do Mochileiro',
                'valor' => 10.0,
                'editora' => 'Teste',
                'edicao' => 1,
                'anopublicacao' => 2000
            ],
            [
                'titulo' => 'As Crônicas de Narnia',
                'valor' => 10.0,
                'editora' => 'Teste',
                'edicao' => 1,
                'anopublicacao' => 2000
            ],
        ];

        // Insere no banco
        $this->db->table('livro')->insertBatch($data);
    }
}
