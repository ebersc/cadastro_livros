<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Assunto as AssuntoModel;

class Assunto extends BaseController
{
    /**
     * Listagem dos assuntos cadastrados
     * @access public
     */
    public function index()
    {
        $assunto = (new AssuntoModel())->buscarTodos();

        $dados = [
            'base_url' => base_url(),
            'assuntos' => $assunto
        ];
        return view('assuntos/listar', $dados);
    }

    /**
     * Exibir o formulario de cadastro
     * @access public
     */
    public function cadastrar()
    {
        $dados = [
            'base_url' => base_url(),
            'titulo' => 'Novo',
            'assunto' => []
        ];
        return view('assuntos/formAssunto', $dados);
    }

    /**
     * Buscar os dados do assunto e exibir formulario de edição
     * @param int $id
     * @access public
     */
    public function editar(int $id)
    {

        $assunto = (new AssuntoModel())->buscar($id);

        $dados = [
            'base_url' => base_url(),
            'titulo' => 'Editar',
            'assunto' => $assunto,
        ];
        
        return view('assuntos/formAssunto', $dados);
    }

    /**
     * Gravar ou atualizar o assunto na base de dados
     * @access public
     * @return void
     */
    public function salvar()
    {
        $request = \Config\Services::request();
        $assunto = $request->getPost();

        try {
            if ($assunto['id']) {
                (new AssuntoModel())->atualizar($assunto['id'], $assunto);
            } else {
                $id = (new AssuntoModel())->inserir($assunto);
            }

            echo json_encode([
                'status' => 200,
                'message' => "Dados inseridos com sucesso!"
            ]);
        } catch (\CodeIgniter\Database\Exceptions\DataException $e) {
            log_message('error', 'Erro de dados: ' . $e->getMessage());
            echo json_encode([
                'status' => 500,
                'message' => 'Erro de dados: ' . $e->getMessage()
            ]);
        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {
            log_message('error', 'Erro de banco: ' . $e->getMessage());
            echo json_encode([
                'status' => 500,
                'message' => 'Erro de banco: ' . $e->getMessage()
            ]);
        } catch (\Exception $e) {
            echo json_encode([
                'status' => 500,
                'message' => "Erro ao salvar o assunto!"
            ]);
        }
    }

    /**
     * Excluir o assunto
     * @param int codau
     * @return void
     */
    public function excluir()
    {
        try {
            $id = $this->request->getJSON(true)['codas'];

            (new AssuntoModel())->excluir($id);

            echo json_encode([
                'status' => 200,
                'message' => "Assunto excluido com sucesso!"
            ]);
        } catch (\CodeIgniter\Database\Exceptions\DataException $e) {
            log_message('error', 'Erro de dados: ' . $e->getMessage());
            echo json_encode([
                'status' => 500,
                'message' => 'Erro de dados: ' . $e->getMessage()
            ]);
        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {
            log_message('error', 'Erro de banco: ' . $e->getMessage());
            echo json_encode([
                'status' => 500,
                'message' => 'Erro de banco: ' . $e->getMessage()
            ]);
        } catch (\Exception $e) {
            echo json_encode([
                'status' => 500,
                'message' => "Erro ao excluir o assunto!"
            ]);
        }
    }
}
