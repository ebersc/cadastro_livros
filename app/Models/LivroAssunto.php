<?php

namespace App\Models;

use App\Models\MY_Model;

class LivroAssunto extends MY_Model
{
    protected $allowedFields = [
        'livro_codl',
        'assunto_codas',
    ];

    public function __construct()
    {
        parent::__construct();
        $this->table = 'livro_assunto';
    }

    public function atualizarDados(array $data)
    {
        if ($this->verificaDadoExiste($data['id'])) {
            $sql = <<<SQL
            UPDATE
                {$this->table}
            SET assunto_codas = {$data['assunto']}
            WHERE livro_codl = {$data['id']}
SQL;
            return $this->executar($sql);
        } else {
            return $this->inserir(['livro_codl' => $data['id'], 'assunto_codas' => $data['assunto']]);
        }
    }

    public function excluirLivroAssunto(int $cold)
    {
        $sql = <<<SQL
            DELETE
                FROM {$this->table}
            WHERE livro_codl = {$cold}
SQL;

        return $this->executar($sql);
    }
}
