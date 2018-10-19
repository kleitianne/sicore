<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->database('sicore');
        $this->load->model('Evento_model');
        $this->load->model('Redacao_model');
        $this->load->model('User_model');

    }
	public function login()
	{
		$this->load->view('head');
		$this->load->view('login');
	}
	

	public function recuperarTextoMotivador()
	{
		$idEvento = $this->uri->segment(3);
		$dados['evento'] = $this->Evento_model->recuperarUmEvento($idEvento);
		$nomearquivo = $dados['evento']->nomeArquivoMotivador;

		redirect('assets/textosmotivadores/'.$nomearquivo);
	}

	
	

	
}
