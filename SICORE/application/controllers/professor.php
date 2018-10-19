<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Professor extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->database('sicore');
        $this->load->model('Evento_model');
        $this->load->model('Redacao_model');
        $this->load->model('User_model');
        $this->load->model('Avaliacao_model');
        //Carrega BD automaticamente para todos.
    }

    public function home()
	{
		$dados['evento'] = $this->Evento_model->recuperarEvento();
		$this->load->view('head');
		
		$this->load->view('menu');
		$this->load->view('home',$dados);
		$this->load->view('scripts');
	}
	 public function visualizarNota()
	{
		$this->load->view('head');
		$this->load->view('menu');
		$this->load->view('visualizarNota');
		$this->load->view('scripts');
	}
	

	public function criarEvento()
	{
		$id_usuario = $this->session->userdata("usuario")->id_usuario;
		$dados['professor'] = $this->User_model->recuperarTodosOsProfessores($id_usuario);
		$this->load->view('head');
		
		$this->load->view('menu');
		$this->load->view('criarEvento', $dados);
		$this->load->view('scripts');
	} 

	public function salvarEvento()
	{
		$id_usuario = $this->session->userdata("usuario")->id_usuario;
		$dados['usuario'] = $this->User_model->recuperarUmUsuario($id_usuario);

		//Pega valores do form.
		$nome = $_POST['nome'];
		$tema = $_POST['tema'];
		$inicio = $_POST['inicio'];
		$fim = $_POST['fim'];
		$ativo = 1;
		$criterio = $_POST['criterio'];
		$fk_usuario = $dados['usuario']->id_usuario;

		//Recupera o nome do arquivo.
		$arquivo = $_FILES['textos'];
		$nomearquivo = $arquivo['name'];
		$tmp = $arquivo['tmp_name'];

		//Recupera a extensão do arquivo.
		$extensao = substr($arquivo['name'], -4);

		//Junta o nome com a extensão.
		$novoNome = md5($nomearquivo).$extensao;
		$arquivoName = $novoNome;

		//Move o arquivo para a assets/redacoes.
		move_uploaded_file($tmp, 'assets/textosmotivadores/'.$novoNome);

		$this->Evento_model-> nome = $nome;
		$this->Evento_model-> tema = $tema;
		$this->Evento_model-> inicio = $inicio;
		$this->Evento_model-> fim = $fim;
		$this->Evento_model-> ativo = $ativo;
		$this->Evento_model-> criterio = $criterio;
		$this->Evento_model-> textoM = $arquivoName;
		$this->Evento_model-> fk_usuario = $fk_usuario;
		$this->Evento_model->inserirEvento();

		$fk_evento= $this->Evento_model->ultimoIdEvento();
		$avaliador = $_POST['professor'];
		$this->Evento_model-> fk_usuario = $id_usuario;
		$this->Evento_model-> fk_evento = $fk_evento;
		$this->Evento_model->inserirAvaliadores();
		foreach ($avaliador as $a) {
			$dados['avaliador'] = $this->User_model->recuperarProfessor($a);
			
		
			$this->Evento_model-> fk_usuario = $a;
			$this->Evento_model-> fk_evento = $fk_evento;
			$this->Evento_model->inserirAvaliadores();
		}
		

		redirect('aluno/homeAluno');
	} 

	public function verEvento(){
		$idEvento = $this->uri->segment(3);
		$dados['evento'] = $this->Evento_model->recuperarUmEvento($idEvento);
		$idtipoDeCriterio = $dados['evento']->fk_tipoDeCriterio;
		$dados['criterio'] = $this->Evento_model->recuperarTipoDeCriterio($idtipoDeCriterio);
	
		$this->load->view('head');
		$this->load->view('menu');
		$this->load->view('verEvento', $dados);
		$this->load->view('scripts');
	}

	public function editarEvento(){
		$idEvento = $this->uri->segment(3);
		$dados['evento'] = $this->Evento_model->recuperarUmEvento($idEvento);
		$idtipoDeCriterio = $dados['evento']->fk_tipoDeCriterio;
		$dados['criterio'] = $this->Evento_model->recuperarTipoDeCriterio($idtipoDeCriterio);
		$dados['avaliador'] = $this->User_model->recuperarProfessorEvento($idEvento);
	
		$this->load->view('head');
		$this->load->view('menu');
		$this->load->view('editarEvento', $dados);
		$this->load->view('scripts');
	}

	public function professoresParticipantes(){
		$idEvento = $this->uri->segment(3);
		$dados['avaliador'] = $this->User_model->recuperarProfessorEvento($idEvento);
		$this->load->view('head');
		$this->load->view('menu');
		$this->load->view('avaliadoresEvento', $dados);
		$this->load->view('scripts');
	}

	public function arquivarEvento(){
		$idEvento = $this->uri->segment(3);

		$id_usuario = $this->session->userdata("usuario")->id_usuario;
		$dados['usuario'] = $this->User_model->recuperarUmUsuario($id_usuario);
		$dados['evento'] = $this->Evento_model->recuperarUmEvento($idEvento);
		
		
		$nome = $dados['evento']->nomeEvento;
		$tema = $dados['evento']->temaEvento;
		$inicio = $dados['evento']->dataInicio;
		$fim = $dados['evento']->dataFim;
		$ativo = 0;
		$criterio = $dados['evento']->fk_tipoDeCriterio;
		$fk_usuario = $dados['usuario']->id_usuario;
		$arquivoName = $dados['evento']->nomeArquivoMotivador;

		$dados = array(
            "nomeEvento"=>$nome,
			"temaEvento"=>$tema,
			"dataInicio"=>$inicio,
			"dataFim"=>$fim,
			"ativo"=>$ativo,
			"fk_tipoDeCriterio"=>$criterio,
			"nomeArquivoMotivador"=>$arquivoName,
			"fk_usuario"=>$fk_usuario
        );
        $this->Evento_model->updateEvento($idEvento,$dados);
        redirect('professor/home');
		
	}

	public function desarquivarEvento(){
		$idEvento = $this->uri->segment(3);

		$id_usuario = $this->session->userdata("usuario")->id_usuario;
		$dados['usuario'] = $this->User_model->recuperarUmUsuario($id_usuario);
		$dados['evento'] = $this->Evento_model->recuperarUmEvento($idEvento);
		
		
		$nome = $dados['evento']->nomeEvento;
		$tema = $dados['evento']->temaEvento;
		$inicio = $dados['evento']->dataInicio;
		$fim = $dados['evento']->dataFim;
		$ativo = 1;
		$criterio = $dados['evento']->fk_tipoDeCriterio;
		$fk_usuario = $dados['usuario']->id_usuario;
		$arquivoName = $dados['evento']->nomeArquivoMotivador;

		$dados = array(
            "nomeEvento"=>$nome,
			"temaEvento"=>$tema,
			"dataInicio"=>$inicio,
			"dataFim"=>$fim,
			"ativo"=>$ativo,
			"fk_tipoDeCriterio"=>$criterio,
			"nomeArquivoMotivador"=>$arquivoName,
			"fk_usuario"=>$fk_usuario
        );
        $this->Evento_model->updateEvento($idEvento,$dados);
        redirect('professor/home');
		
	}

	public function eventosArquivados(){
		$dados['evento'] = $this->Evento_model->recuperarEventoArquivado();
		$this->load->view('head');
		$this->load->view('menu');
		$this->load->view('eventosArquivados',$dados);
		$this->load->view('scripts');
	}

	public function atualizarEvento(){
		$idEvento = $this->uri->segment(3);
		$id_usuario = $this->session->userdata("usuario")->id_usuario;
		$dados['usuario'] = $this->User_model->recuperarUmUsuario($id_usuario);

		$nome = $_POST['nome'];
		$tema = $_POST['tema'];
		$inicio = $_POST['inicio'];
		$fim = $_POST['fim'];
		$ativo = 1;
		$criterio = $_POST['criterio'];
		$fk_usuario = $id_usuario;
		$arquivoName = $_POST['textos'];

		$dados = array(
            "nomeEvento"=>$nome,
			"temaEvento"=>$tema,
			"dataInicio"=>$inicio,
			"dataFim"=>$fim,
			"ativo"=>$ativo,
			"fk_tipoDeCriterio"=>$criterio,
			"nomeArquivoMotivador"=>$arquivoName,
			"fk_usuario"=>$fk_usuario
        );
        $this->Evento_model->updateEvento($idEvento,$dados);
        redirect('professor/verEvento/'.$idEvento);     

	}
	
	public function verRedacao(){
		$idEvento = $this->uri->segment(3);
		
		$dados['evento'] = $this->Evento_model->recuperarUmEvento($idEvento);
		$dados['redacao'] = $this->Redacao_model->recuperarRedacoesEvento($idEvento);


		$this->load->view('head');
		$this->load->view('menu');
		$this->load->view('verRedacoesProfessor', $dados);
		$this->load->view('scripts');
	}


	public function corrigirRedacao(){
		$idRedacao = $this->uri->segment(3);
		$dados['num_redacao']= $this->uri->segment(4);
		
		$dados['redacao'] = $this->Redacao_model->recuperarUmaRedacao($idRedacao);
		$idEvento = $dados['redacao']->fk_evento;
		$dados['evento'] = $this->Evento_model->recuperarUmEvento($idEvento);
		$tipoDeCriterio = $dados['evento']->fk_tipoDeCriterio;
		$dados['criterio'] = $this->Redacao_model->recuperarCriterio($tipoDeCriterio);
		
		$this->load->view('head');
		$this->load->view('menu');
		$this->load->view('corrigirRedacao', $dados);
		$this->load->view('scripts');
	}
	public function verEventosArquivados(){
		$idEvento = $this->uri->segment(3);
		$dados['evento'] = $this->Evento_model->recuperarUmEvento($idEvento);
		$idtipoDeCriterio = $dados['evento']->fk_tipoDeCriterio;
		$dados['criterio'] = $this->Evento_model->recuperarTipoDeCriterio($idtipoDeCriterio);
	
		$this->load->view('head');
		$this->load->view('menu');
		$this->load->view('verEventosArquivados', $dados);
		$this->load->view('scripts');
	}

	public function verificarRedacao(){
		
		$idEvento = $this->uri->segment(3);
		$idRedacao = $this->uri->segment(4);
		$num_redacao = $this->uri->segment(5);

		$id_usuario = $this->session->userdata("usuario")->id_usuario;
		
		$dados['evento'] = $this->Evento_model->recuperarUmEvento($idEvento);
		$dados['avaliador'] = $this->Avaliacao_model->recuperarAvaliador($id_usuario,$idEvento);
		$fk_avaliador = $dados['avaliador']->id_avaliador;
		$avaliador = $this->Redacao_model->recuperarAvaliacao($idRedacao, $fk_avaliador);

		if(sizeof($avaliador)!=0){
			redirect('professor/atualizarCorrecao');
		}
		else{
			redirect('professor/corrigirRedacao/'.$idRedacao.'/'.$num_redacao);
		}
			
	}

	public function verificarRedacoes(){
		$idEvento = $this->uri->segment(3);
		$dados['evento'] = $this->Evento_model->recuperarUmEvento($idEvento);
		$redacao = $this->Redacao_model->recuperarRedacoesEvento($idEvento);
		$corrigidas = [];
		$redacoes = [];
		foreach ($redacao as $r) {
			$avaliacao = $this->Redacao_model->recuperarAvaliacoes($r->id_redacao);
			
			if(sizeof($avaliacao)==3){
				array_push($corrigidas,$r);
			}
			else{
				if(sizeof($avaliacao)==2){
					$avaliacao = $this->Redacao_model->recuperarAvaliacoes($r->id_redacao);
					$media = 0;
					$nota1 = $this->Avaliacao_model->recuperarNota($r->id_redacao,$avaliacao[0]->id_avaliacao);
					$nota2 = $this->Avaliacao_model->recuperarNota($r->id_redacao,$avaliacao[1]->id_avaliacao);
					$media1 = 0;
					$media2 = 0;

					foreach ($nota1 as $n1) {
						$media1 = $media1 + $n1->nota;
					}

					foreach ($nota2 as $n2) {
						$media2 = $media2 + $n2->nota;
					}
					if($media1-$media2 <=200){
						array_push($redacoes,$r);
					}
					else{
						array_push($corrigidas,$r);
					}
				}
				
			}

		}
		$dados['redacao'] = $redacoes;
		$this->load->view('head');
		$this->load->view('menu');
		$this->load->view('verRedacoesProfessor', $dados);
		$this->load->view('scripts');
	}

	public function avaliarRedacao(){
		$id_usuario = $this->session->userdata("usuario")->id_usuario;
		$fk_evento = $_POST['fk_evento'];
		$fk_redacao = $_POST['fk_redacao'];
		$dados['avaliador'] = $this->Avaliacao_model->recuperarAvaliador($id_usuario,$fk_evento);
		$dados['evento'] = $this->Evento_model->recuperarUmEvento($fk_evento);
		$tipoDeCriterio = $dados['evento']->fk_tipoDeCriterio;
		$fk_avaliador = $dados['avaliador']->id_avaliador;

		$this->Avaliacao_model-> fk_avaliador = $fk_avaliador;
		$this->Avaliacao_model-> fk_redacao = $fk_redacao;
		$this->Avaliacao_model-> fk_tipoDeCriterio = $tipoDeCriterio;
		$this->Avaliacao_model->salvarAvaliacao();

		$fk_avaliacao = $this->Avaliacao_model->ultimoIdAvaliacao();
		$comentario = $_POST['comentario'];
		$nota = $_POST['nota'];
		
		foreach (array_keys($nota) as $n) {
				$valor = $nota[$n];
				$this->Avaliacao_model-> fk_avaliacao = $fk_avaliacao;
				$this->Avaliacao_model-> comentario = $comentario;
				$this->Avaliacao_model-> nota = $valor;
				$this->Avaliacao_model-> fk_criterio = $n;
				$this->Avaliacao_model->salvarAvaliacaoCriterio();
		}
		redirect('professor/verRedacao/'.$fk_evento);

	}

	public function atualizarCorrecao(){
		print_r("deucerto");
	}

	public function calcularMedia(){
		$idRedacao = $this->uri->segment(3);
		$avaliacao = $this->Redacao_model->recuperarAvaliacoes($idRedacao);
		$qtd_avaliadores = sizeof($avaliacao);

		if ($qtd_avaliadores == 1) {
			$media = 0;
			foreach ($avaliacao as $a) {
				$notas = $this->Avaliacao_model->recuperarNota($idRedacao,$a->id_avaliacao);
				foreach ($notas as $n) {
					$media = $media + $n->nota;
				}
				
			}

		}
		elseif ($qtd_avaliadores == 2) {
			$media = 0;
			$nota1 = $this->Avaliacao_model->recuperarNota($idRedacao,$avaliacao[0]->id_avaliacao);
			$nota2 = $this->Avaliacao_model->recuperarNota($idRedacao,$avaliacao[1]->id_avaliacao);
			$media1 = 0;
			$media2 = 0;

			foreach ($nota1 as $n1) {
				$media1 = $media1 + $n1->nota;
			}

			foreach ($nota2 as $n2) {
				$media2 = $media2 + $n2->nota;
			}
			$total = ($media1+$media2)/2;
		}

		elseif ($qtd_avaliadores == 3) {
			$media = 0;
			$nota1 = $this->Avaliacao_model->recuperarNota($idRedacao,$avaliacao[0]->id_avaliacao);
			$nota2 = $this->Avaliacao_model->recuperarNota($idRedacao,$avaliacao[1]->id_avaliacao);
			$nota3 = $this->Avaliacao_model->recuperarNota($idRedacao,$avaliacao[3]->id_avaliacao);
			$media1 = 0;
			$media2 = 0;
			$media3 = 0;

			foreach ($nota1 as $n1) {
				$media1 = $media1 + $n1->nota;
			}

			foreach ($nota2 as $n2) {
				$media2 = $media2 + $n2->nota;
			}
			foreach ($nota3 as $n3) {
				$media3 = $media3 + $n3->nota;
			}
			$total = ($media1+$media2+$media3)/3;
		}
	}

	public function rankingEvento(){
		$idEvento = $this->uri->segment(3);
		$dados['redacaom'] = $this->Redacao_model->recuperarRedacoesRanking($idEvento);
		print_r($dados['redacaom']);
	}
}
?>