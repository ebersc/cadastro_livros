<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Autor as AutorModel;

class Autor extends BaseController
{
    /**
     * Listagem dos autores cadastrados
     */
    public function index()
    {
        $autores = (new AutorModel())->buscarTodos();

        $dados = [
            'base_url' => base_url(),
            'autores' => $autores
        ];
        return view('autores/listar', $dados);
    }

    /**
     * Exibir o formulario de cadastro
     */
    public function cadastrar()
    {
        $dados = [
            'base_url' => base_url(),
            'titulo' => 'Novo',
            'autor' => []
        ];
        return view('autores/formAutor', $dados);
    }

    /**
     * Buscar os dados do autor
     * @param int $id
     */
    public function editar(int $id)
    {

        $autor = (new AutorModel())->buscar($id);

        $dados = [
            'base_url' => base_url(),
            'titulo' => 'Editar',
            'autor' => $autor,
        ];
        return view('autores/formAutor', $dados);
    }

    /**
     * Gravar ou atualizar o autor
     * @return void
     */
    public function salvar()
    {
        $request = \Config\Services::request();
        $autor = $request->getPost();

        try {
            if ($autor['id']) {
                (new AutorModel())->atualizar($autor['id'], $autor);
            } else {
                $id = (new AutorModel())->inserir($autor);
            }

            echo json_encode([
                'status' => 200,
                'message' => "Dados inseridos com sucesso!"
            ]);
        } catch (\CodeIgniter\Database\Exceptions\DataException $e) {
            log_message('error', 'Erro de dados: ' . $e->getMessage());
            echo json_encode([
                'status' => 500,
                'message' => "Erro ao salvar o livro!"
            ]);
        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {
            log_message('error', 'Erro de banco: ' . $e->getMessage());
            echo json_encode([
                'status' => 500,
                'message' => "Erro ao salvar o livro!"
            ]);
        } catch (\Exception $e) {
            echo json_encode([
                'status' => 500,
                'message' => "Erro ao salvar o livro!"
            ]);
        }
    }

    /**
     * Excluir o autor
     * @param int codau
     * @return void
     */
    public function excluir()
    {
        try {
            $id = $this->request->getJSON(true)['codau'];

            (new AutorModel())->excluir($id);

            echo json_encode([
                'status' => 200,
                'message' => "Livro excluido com sucesso!"
            ]);
        } catch (\CodeIgniter\Database\Exceptions\DataException $e) {
            log_message('error', 'Erro de dados: ' . $e->getMessage());
            echo json_encode([
                'status' => 500,
                'message' => "Erro ao excluir o livro!"
            ]);
        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {
            log_message('error', 'Erro de banco: ' . $e->getMessage());
            echo json_encode([
                'status' => 500,
                'message' => "Erro ao excluir o livro!"
            ]);
        } catch (\Exception $e) {
            echo json_encode([
                'status' => 500,
                'message' => "Erro ao excluir o livro!"
            ]);
        }
    }
}
