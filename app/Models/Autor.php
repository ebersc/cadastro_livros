<?php

namespace App\Models;

use App\Models\MY_Model;

class Autor extends MY_Model
{
    protected $primaryKey = 'codau';

    protected $allowedFields = [
        'nome'
	];

	public function __construct()
	{
		parent::__construct();
		$this->table = 'autor';
	}
}
