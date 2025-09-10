<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Autor;
use App\Models\Livro as LivroModel;
use App\Models\Assunto;
use App\Models\LivroAssunto;
use App\Models\LivroAutor;

class Livro extends BaseController
{
	/**
	 * Listagem dos livros cadastrados
	 */
    public function index(){
		$livros = (new LivroModel())->buscarTodos();

		$dados = [
			'base_url' => base_url(),
			'livros' => $livros
		];
		return view('livros/listar', $dados);
	}

	/**
	 * Exibir o formulario de cadastro
	 */
	public function cadastrar(){
		
		$autores = (new Autor())->buscarTodos();
		$assuntos = (new Assunto())->buscarTodos();

		$dados = [
            'base_url' => base_url(),
            'titulo'   => 'Novo',
            'autores'  => $autores,
            'assuntos' => $assuntos,
            'livro'    => []
		];
		return view('livros/formLivro', $dados);
	}

	/**
	 * Buscar os dados do livro
	 * @param int $id
	 */
	public function editar(int $id){

		$livro = (new LivroModel())->buscarDadosLivro($id);
		$autores = (new Autor())->buscarTodos();
		$assuntos = (new Assunto())->buscarTodos();

		$dados = [
            'base_url' => base_url(),
            'titulo'   => 'Editar',
            'livro'    => $livro,
            'autores'  => $autores,
            'assuntos' => $assuntos
		];
		return view('livros/formLivro', $dados);
	}

	/**
	 * Gravar ou atualizar o livro
	 * @return void
	 */
	public function salvar(){
		$request = \Config\Services::request();
		$livro = $request->getPost();
		
		try{
			if($livro['id']){
				(new LivroModel())->atualizar($livro['id'], $livro);
				(new LivroAutor())->atualizarDados($livro);
				(new LivroAssunto())->atualizarDados($livro);
			}else {
				$id = (new LivroModel())->inserir($livro);
				(new LivroAutor())->inserir(['livro_codl' => $id, 'autor_codau' => $livro['autor']]);
				(new LivroAssunto())->inserir(['livro_codl' => $id, 'assunto_codas' => $livro['assunto']]);
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
	 * Excluir o Livro
	 * @param int codl
	 * @return void
	 */
	public function excluir(){
		try{
			$id = $this->request->getJSON(true)['codl'];

			(new LivroAutor())->excluirLivroAutor($id);

			(new LivroAssunto())->excluirLivroAssunto($id);
			
			(new LivroModel())->excluir($id);

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
