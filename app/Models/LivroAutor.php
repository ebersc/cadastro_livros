<?php

namespace App\Models;

use App\Models\MY_Model;

class LivroAutor extends MY_Model
{
    protected $primaryKey = 'codl';

    protected $allowedFields = [
        'livro_codl',
        'autor_codau',
    ];

    public function __construct()
    {
        parent::__construct();
        $this->table = 'livro_autor';
    }

    public function atualizarDados(array $data)
    {
        if ($this->verificaDadoExiste($data['id'])) {
            $sql = <<<SQL
            UPDATE
                {$this->table}
            SET autor_codau = {$data['autor']}
            WHERE livro_codl = {$data['id']}
SQL;
            return $this->executar($sql);
        } else {
            return $this->inserir(['livro_codl' => $data['id'], 'autor_codau' => $data['autor']]);
        }
    }

    public function excluirLivroAutor(int $cold)
    {
        $sql = <<<SQL
            DELETE
                FROM {$this->table}
            WHERE livro_codl = {$cold}
SQL;

        return $this->executar($sql);
    }
}
