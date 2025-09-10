<?php

namespace App\Models;

use App\Models\MY_Model;

class Livro extends MY_Model
{
    protected $primaryKey = 'codl';

    protected $allowedFields = [
        'titulo',
        'editora',
        'edicao',
        'anopublicacao',
        'valor'
	];

	public function __construct()
	{
		parent::__construct();
		$this->table = 'livro';
	}

    public function buscarDadosLivro(int $id){
        $sql = <<<SQL
			SELECT
                l.codl AS id,
                l.titulo,
                l.editora,
                l.edicao,
                l.valor,
                l.anopublicacao,
                GROUP_CONCAT(DISTINCT la.assunto_codas) AS assunto_codas,
                GROUP_CONCAT(DISTINCT  lau.autor_codau) AS  autor_codau
            FROM {$this->table} l
                LEFT JOIN
                    livro_assunto la ON l.codl = la.livro_codl
                LEFT JOIN
                    livro_autor lau ON l.codl = lau.livro_codl
			WHERE
				l.codl = $id
            GROUP BY l.codl, l.valor, l.titulo, l.editora, l.edicao, l.anopublicacao
SQL;
		return $this->executarSql($sql);
    }
}
