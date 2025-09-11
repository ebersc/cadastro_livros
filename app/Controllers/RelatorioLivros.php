<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Livro as LivroModel;
use App\Models\Autor;
use App\Models\Assunto;

class RelatorioLivros extends BaseController
{
    public function index()
    {
        $livros   = (new LivroModel())->buscarTodos();
        $autores  = (new Autor())->buscarTodos();
        $assuntos = (new Assunto())->buscarTodos();

		$dados = [
            'base_url' => base_url(),
            'livros'   => $livros,
            'autores'  => $autores,
            'assuntos' => $assuntos
		];
		return view('relatorio/filtros', $dados);
    }

    private function montarWhere($dados): string
    {
        $where = [];
        if(!empty($dados['autor'])){
            $where[] = "autor_id IN (" . implode(",", $dados['autor']) . ") ";
        }

        if(!empty($dados['assunto'])){
            $where[] = implode(' OR ', array_map(fn($id) => "FIND_IN_SET($id, assunto_ids)", $dados['assunto']));
        }

        if(!empty($dados['ano_filtro'])){
            $where[] = "livro_ano = {$dados['ano_filtro']}";
        }

        return implode(" AND ", $where);
    }

    public function datatables()
    {
        $db      = \Config\Database::connect();
        $request = service('request');

        $draw   = $request->getGet('draw') ?? 1;
        $start  = $request->getGet('start') ?? 0;
        $length = $request->getGet('length') ?? 10;
        $search = $request->getGet('search')['value'] ?? '';
        $order  = $request->getGet('order');
        $columns = ['autor_nome', 'livro_titulo', 'livro_ano', 'livro_edicao', 'livro_valor', 'assuntos'];

        $filtros = $request->getGet();
        $where   = $this->montarWhere($filtros);

        $sqlBase = (new LivroModel())->montarQueryRelatorio($where);

        if (!empty($search)) {
            $sqlBase = "SELECT * FROM ($sqlBase) AS base
                        WHERE autor_nome LIKE '%$search%'
                        OR livro_titulo LIKE '%$search%'
                        OR assuntos LIKE '%$search%'";
        }

        $totalFiltered = $db->query("SELECT COUNT(*) as total FROM ($sqlBase) as tmp")->getRow()->total;

        if (!empty($order)) {
            $colIndex = $order[0]['column'];
            $dir      = $order[0]['dir'];
            $colName  = $columns[$colIndex] ?? 'livro_titulo';
            $sqlBase .= " ORDER BY $colName $dir";
        }

        $sqlBase .= " LIMIT $start, $length";

        $query = $db->query($sqlBase);
        $data  = $query->getResultArray();

        $sqlSemFiltro = (new LivroModel())->montarQueryRelatorio('');
        $totalData    = $db->query("SELECT COUNT(*) as total FROM ($sqlSemFiltro) as tmp")->getRow()->total;

        return $this->response->setJSON([
            "draw"            => intval($draw),
            "recordsTotal"    => $totalData,
            "recordsFiltered" => $totalFiltered,
            "data"            => $data,
        ]);
    }

}
