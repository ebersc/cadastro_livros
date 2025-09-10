<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Livro as LivroModel;

class Livro extends BaseController
{
    public function index(){
		$livros = (new LivroModel())->buscarTodos();

		$dados = [
			'base_url' => base_url(),
			'livros' => $livros
		];
		return view('livros/listar', $dados);
	}
	public function cadastrar(){
		$dados = [
            'base_url' => base_url(),
            'titulo'   => 'Novo',
            'autores'  => [],
            'assuntos' => []
		];
		return view('livros/formLivro', $dados);
	}

	public function editar($idItem){

		$item = (new Item())->buscarDadosItem($idItem);

		$dados = [
			'base_url' => base_url(),
			'usuario' => $this->session->get('usuario'),
			'titulo' => 'Editar',
			'item' => $item
		];
		return view('itens/formLivro', $dados);
	}

	public function salvar(){
		$request = \Config\Services::request();
		$item = $request->getPost();

		$item['valor_individual'] = str_replace([',', ' ', 'R$'], ['.', '', ''], $item['valor_individual']);

		try{
			if($item['id']){
				(new Item())->atualizar($item['id'], $item);
			}else {
				$id = (new Item())->inserir($item);
			}
			echo json_encode([
				'status' => 200,
				'message' => "Dados inseridos com sucesso!"
			]);
		}catch(\Exception $ex){
			throw $ex;
		}
	}

	public function excluir(){
		try{
			$request = \Config\Services::request();

			$id = $request->getPost('id');
			(new Item())->excluir($id);
			echo json_encode([
				'status' => 200,
				'message' => "Livro excluido com sucesso!"
			]);
		}catch(\Exception $ex){
			echo json_encode([
				'status' => 500,
				'message' => "Livro ao excluir o item!"
			]);
		}
	}
}
