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
        'anopublicacao'
	];

	public function __construct()
	{
		parent::__construct();
		$this->table = 'livro';
	}
    
}
