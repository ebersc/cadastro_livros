<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Autor;
use App\Models\Livro as LivroModel;
use App\Models\Assunto;
use App\Models\LivroAssunto;
use App\Models\LivroAutor;
use Exception;
use Throwable;

class Livro extends BaseController
{
	/**
	 * Listagem dos livros cadastrados
	 * @access public
	 */
	public function index()
	{
		$livros = (new LivroModel())->buscarTodos();

		$dados = [
			'base_url' => base_url(),
			'livros' => $livros
		];
		return view('livros/listar', $dados);
	}

	/**
	 * Exibir o formulario de cadastro
	 * @access public
	 */
	public function cadastrar()
	{

		$autores = (new Autor())->buscarTodos();
		$assuntos = (new Assunto())->buscarTodos();

		$dados = [
			'base_url' => base_url(),
			'titulo' => 'Novo',
			'autores' => $autores,
			'assuntos' => $assuntos,
			'livro' => []
		];
		return view('livros/formLivro', $dados);
	}

	/**
	 * Buscar os dados do livro e exibir formulario de edição
	 * @param int $id
	 * @access public
	 */
	public function editar(int $id)
	{

		$livro = (new LivroModel())->buscarDadosLivro($id);

		foreach ($livro as &$linha) {
			$linha['assunto_codas'] = explode(',', $linha['assunto_codas']);
			$linha['autor_codau']  = explode(',', $linha['autor_codau']);
		}

		$autores = (new Autor())->buscarTodos();
		$assuntos = (new Assunto())->buscarTodos();

		$dados = [
			'base_url' => base_url(),
			'titulo' => 'Editar',
			'livro' => $livro,
			'autores' => $autores,
			'assuntos' => $assuntos
		];
		return view('livros/formLivro', $dados);
	}

	/**
	 * Salvar ou atualizar os dados do livro na base de dados
	 * @access public
	 * @return void
	 */
	public function salvar()
	{
		$request = \Config\Services::request();
		$livro = $request->getPost();

		$livro = $this->tratarDados($livro);

		try {
			if ($livro['id']) {
				(new LivroModel())->atualizar($livro['id'], $livro);
				$this->inserirAssuntos($livro);
				$this->inserirAutores($livro);
			} else {
				$id = (new LivroModel())->inserir($livro);
				$this->inserirAssuntos($livro, $id);
				$this->inserirAutores($livro, $id);
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
				'message' => "Erro ao salvar o livro!"
			]);
		}
	}

	/**
	 * Função para excluir o Livro
	 * @access public
	 * @return void
	 */
	public function excluir()
	{
		try {
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

	/**
	 * Função para formatar o valor do livro para o padrão SQL
	 * substituindo a ',' dos decimais por '.'
	 * @param array $dados
	 * @access private
	 * @return array
	 */
	private function tratarDados(array $dados): array
	{
		if (isset($dados['valor'])) {
			$valor = str_replace(['.', ','], ['', '.'], $dados['valor']);

			$dados['valor'] = floatval($valor);
		}

		return $dados ?? [];
	}

	/**
	 * Função para inserir o(s) autor(es) do livro
	 * Em caso de update remove as relações livro <-> autor já existentes e grava as novas
	 * @param array $livro - Dados do livro
	 * @param ?int $id - ID do livro
	 * @access private
	 * @return void
	 */
	private function inserirAutores(array $livro, int $id = null)
	{
		try {
			$id = ($id ?? $livro['id']);

			(new LivroAutor())->excluirLivroAutor($id);

			foreach ($livro['autor'] as $key => $value) {
				(new LivroAutor())->inserir(['livro_codl' => $id, 'autor_codau' => $value]);
			}

		} catch (Throwable $th) {
			throw $th;
		}
	}

	/**
	 * Função para inserir o(s) assunto(s) do livro
	 * Em caso de update remove as relações livro <-> assunto já existentes e grava as novas
	 * @param array $livro - Dados do livro
	 * @param ?int $id - ID do livro
	 * @access private
	 * @return void
	 */
	private function inserirAssuntos(array $livro, int $id = null)
	{
		try {
			$id = ($id ?? $livro['id']);

			(new LivroAssunto())->excluirLivroAssunto($id);

			foreach ($livro['assunto'] as $key => $value) {
				(new LivroAssunto())->inserir(['livro_codl' => $id, 'assunto_codas' => $value]);
			}
		} catch (Throwable $th) {
			throw $th;
		}
	}
}
