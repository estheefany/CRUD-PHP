<?php
use models\Livro;
use models\Capa;
use models\Usuario;
use models\Leitor;

class LivrosController {

	
	function index($id = null){

		#variáveis que serao passados para a view
		$send = [];

		#cria o model
		$model = new Livro();
		
		
		$send['data'] = null;
		#se for diferente de nulo é porque estou editando o registro
		if ($id != null){
			#então busca o registro do banco
			$send['data'] = $model->findById($id);
		}

		#busca todos os registros
		$send['lista'] = $model->all();

        #recupera a lista com todos os modelos
        $capasModel = new Capa();
        $send['capas'] = $capasModel->all();

		
        #recupera a lista com todos os usuarios
        $usuModel = new Usuario();
        $send['usuarios'] = $usuModel->all();


		#se estiver editando um veiculo
		if ($id != null){
			#recupera todos os motoristas já setados para esse veiculo
			$send['leitores'] = $model->getLeitores($id);
		}
		

		#$send['tipos'] = [0=>"Escolha uma opção", 1=>"Usuário comum", 2=>"Admin"];

		#chama a view
		render("livros", $send);
	}

	
	function salvar($id=null){

		$model = new Livro();
		
		if ($id == null){
			$id = $model->save($_POST);
		} else {
			$id = $model->update($id, $_POST);
		}

		#se a id de um usuario/motorista tiver sido enviada
		if (_v($_POST,'leitor_id')){
			$model = new Leitor();
			$dados = ["usuario_id"=> $_POST['leitor_id'], "livro_id"=>$id];
			$model->save($dados);
		}
		
		
		redirect("livros/index/$id");
	}

	function deletar(int $id){
		
		$model = new Livro();
		$model->delete($id);

		redirect("livros/index/");
	}

	function deletarLeitor(int $idDoRelacionamento){
       
        $model = new Leitor();
        $rel = $model->findById($idDoRelacionamento);
        $model->delete($idDoRelacionamento);

        redirect("livros/index/{$rel['livro_id']}");
    }


}