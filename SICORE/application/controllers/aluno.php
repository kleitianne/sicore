<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aluno extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->database('sicore');
        $this->load->model('Evento_model');
        $this->load->model('Redacao_model');
        $this->load->model('User_model');
        //Carrega BD automaticamente para todos.
    }

    public function homeAluno()
	{
		$id_usuario = $this->session->userdata("usuario")->id_usuario;
		$dados['usuario'] = $this->User_model->recuperarUmUsuario($id_usuario);
		$idEvento = $this->uri->segment(3);
		$dados['evento'] = $this->Evento_model->recuperarUmEvento($idEvento);
		
		$dados['redacao'] = $this->Redacao_model->recuperarRedacoesEvento($idEvento);

		$dados['eventos'] = $this->Evento_model->recuperarEvento();
		$this->load->view('head');
				
		$this->load->view('menuAluno');
		$this->load->view('home-aluno', $dados);
		$this->load->view('scripts');
		
			
	}
	public function submeterRedacao()
	{
		$idEvento = $this->uri->segment(3);
		$dados['evento'] = $this->Evento_model->recuperarUmEvento($idEvento);
		
		$this->load->view('head');
		
		$this->load->view('menuAluno');
		$this->load->view('submeterRedacao',$dados);
		$this->load->view('scripts');
	}

	public function verEventoAluno(){
		$id_usuario = $this->session->userdata("usuario")->id_usuario;
		$dados['usuario'] = $this->User_model->recuperarUmUsuario($id_usuario);
		$idEvento = $this->uri->segment(3);
		$dados['evento'] = $this->Evento_model->recuperarUmEvento($idEvento);
		$idtipoDeCriterio = $dados['evento']->fk_tipoDeCriterio;
		$dados['criterio'] = $this->Evento_model->recuperarTipoDeCriterio($idtipoDeCriterio);
		$dados['redacao'] = $this->Redacao_model->recuperarRedacoesEvento($idEvento);

		$this->load->view('head');
		
		$this->load->view('menuAluno');
		$this->load->view('verEventoAluno', $dados);
		$this->load->view('scripts');
	}

	public function enviarRedacao()
	{ 	
		$id_usuario = $this->session->userdata("usuario")->id_usuario;
		$dados['usuario'] = $this->User_model->recuperarUmUsuario($id_usuario);
		
		$idEvento = $this->uri->segment(3);
		$dados['evento'] = $this->Evento_model->recuperarUmEvento($idEvento);
		$fk_evento = $dados['evento']->id_evento;
		$fk_usuario = $dados['usuario']->id_usuario;

		//Recupera o nome do arquivo.
		$arquivo = $_FILES['redacao'];
		$nomearquivo = $arquivo['name'];
		$tmp = $arquivo['tmp_name'];
	
		$extensao = ".pdf";
		$novoNome = md5($nomearquivo).$extensao;
		$arquivoName = $novoNome;

		//Move o arquivo para  a assets/redacoes.
		move_uploaded_file($tmp, 'assets/redacoes/'.$novoNome);

		$this->Redacao_model-> fk_evento = $fk_evento;
		$this->Redacao_model-> nomeArquivo = $arquivoName;
		$this->Redacao_model-> fk_usuario = $fk_usuario;
		$this->Redacao_model-> notaGeral = 0;
		$this->Redacao_model->inserirRedacao();

		$this->Evento_model-> fk_evento = $fk_evento;
		$this->Evento_model-> fk_usuario = $fk_usuario;
		$this->Evento_model->inserirParticipante();
		


		redirect('aluno/homeAluno');
	}

	public function minhasRedacoes()
	{
		$id_usuario = $this->session->userdata("usuario")->id_usuario;
		$dados['usuario'] = $this->User_model->recuperarUmUsuario($id_usuario);	
		$dados['evento'] = $this->Evento_model->recuperarEventoAluno($id_usuario);

		$this->load->view('head');
		$this->load->view('menuAluno');
		$this->load->view('verRedacao', $dados);
		$this->load->view('scripts');
	}

	public function gerarpdf()
	{

		require_once('fpdf.php');

		$redacao  = $_POST['textos'];  // Sim, a supressão @ é perfeitamente válida neste exemplo
		$pdf = new FPDF();
		$pdf->AddPage(); // padrão o relatório gerado é no formato A4
		$pdf->SetFont('Arial','B',12); // Arial, tamanho 16 em negrito, a fonte deve vir antes do texto
		//$pdf->cell(40,10,'$nome'); //
		$pdf->MultiCell( 190, 8,"$redacao");
		$pdf->Output('D'); //Saída para o navegador 

		//http://www.botecodigital.info/php/criando-arquivos-pdf-com-php-e-classe-fpdf/
	}
	public function alunosParticipantes(){
		$idEvento = $this->uri->segment(3);
		$dados['aluno'] = $this->User_model->recuperarAlunosEvento($idEvento);
		$this->load->view('head');
		$this->load->view('menuAluno');
		$this->load->view('participantesEvento', $dados);
		$this->load->view('scripts');
	}
	public function verificarRedacao(){

		$idEvento = $this->uri->segment(3);
		$id_usuario = $this->session->userdata("usuario")->id_usuario;

		$dados['usuario'] = $this->User_model->recuperarUmUsuario($id_usuario);
		$dados['evento'] = $this->Evento_model->recuperarUmEvento($idEvento);
		$dados['redacoes'] = $this->Redacao_model->verificarUmaRedacao($idEvento, $id_usuario);
		
		if ($dados['redacoes']) {
			$this->session->set_flashdata("msg", "Você já submeteu uma redação a esse evento.");
			redirect('aluno/homeAluno');
		}
		else{redirect('aluno/submeterRedacao/'.$idEvento);}

	}

	public function verRedacao(){
		$idEvento = $this->uri->segment(3);
		//$idRedacao = $this->uri->segment(4);

		$id_usuario = $this->session->userdata("usuario")->id_usuario;

		$dados['redacao'] = $this->Redacao_model->recuperarUmaRedacaoMinhasRedacoes($idEvento, $id_usuario);
		$dados['evento'] = $this->Evento_model->recuperarUmEvento($idEvento);
		$this->load->view('head');
		$this->load->view('menuAluno');
		$this->load->view('verRedacaoAluno', $dados);
		$this->load->view('scripts');
		
	}
}
?>

