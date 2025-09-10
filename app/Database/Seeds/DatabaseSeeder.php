<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call('AutorSeeder');
        $this->call('AssuntoSeeder');
        $this->call('LivroSeeder');
        $this->call('LivroAutorSeeder');
        $this->call('LivroAssuntoSeeder');
    }
}
