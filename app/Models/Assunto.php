<?php

namespace App\Models;

use App\Models\MY_Model;

class Assunto extends MY_Model
{
    protected $primaryKey = 'codas';

    protected $allowedFields = [
        'descricao'
	];

	public function __construct()
	{
		parent::__construct();
		$this->table = 'assunto';
	}
}
