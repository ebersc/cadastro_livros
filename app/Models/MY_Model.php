<?php

namespace App\Models;

use CodeIgniter\Model;

class MY_Model extends Model
{
    /**
     * Retorna um registro específico.
     */
    public function buscar(int $id)
    {
        return $this->find($id);
    }

	 /**
     * Retorna todos os registros.
     */
	public function buscarTodos(){
		return $this->findAll();
	}

    /**
     * Insere um novo registro.
     */
    public function inserir(array $data)
    {
        return $this->insert($data);
    }

    /**
     * Atualiza um registro existente.
     */
    public function atualizar(int $id, array $data)
    {
        return $this->update($id, $data);
    }

    /**
     * Exclui um registro (físico ou lógico).
     */
    public function excluir($id)
    {
        return $this->delete($id);
    }

    /**
     * Retorna registros com filtros opcionais.
     */
    public function buscarComFiltro(array $filters = [], $joins = [])
    {
        $builder = $this->builder();

        // Seleciona todos os campos da tabela principal
        $tabelaPrincipal = $this->table;
        $builder->select("{$tabelaPrincipal}.*");

        // Aplica joins com alias para evitar conflitos
        foreach ($joins as $join) {
            $tabela = $join[0];
            $condicao = $join[1];
            $tipo = $join[2] ?? '';
            $builder->join($tabela, $condicao, $tipo);

            $aliasColunas = $join[3] ?? [];

            // Seleciona os campos da tabela secundária com alias
            $campos = $this->db->getFieldNames($tabela);
            foreach ($campos as $campo) {
                // Evita conflito com campos da principal
                if (!in_array($campo, ['id', 'ativo'])) {
                    // Se tiver alias para a coluna, usa ele
                    if (isset($aliasColunas[$campo])) {
                        $builder->select("{$tabela}.{$campo} AS {$aliasColunas[$campo]}");
                    } else {
                        // Senão cria um padrão
                        $builder->select("{$campo} ");
                    }
                }
            }
        }

        if (!empty($filters)) {
            $builder->where($filters);
        }
        return $builder->get()->getResultArray();
    }

    public function executarSql(string $sql): array{
        $query=$this->db->query($sql);
        return $query->getResultArray();
    }

    public function executar(string $sql){
        $query=$this->db->query($sql);
    }
}
