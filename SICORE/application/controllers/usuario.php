<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->database('sicore');
        $this->load->model('Evento_model');
        $this->load->model('Redacao_model');
        $this->load->model('User_model');
        //Carrega BD automaticamente para todos.
    }

    public function salvarLogin()
	{
		$vinculo = $this->uri->segment(3);
		$matricula = $this->uri->segment(4);
		$nome = $this->uri->segment(5);
		
		$u = $this->User_model->verificarMatriculaEVinculo($matricula, $vinculo);
        if ($u){
            $this->session->set_userdata("usuario", $u);
            $id_usuario = $this->session->userdata("usuario")->id_usuario; 
            $dados['usuario'] = $this->User_model->recuperarUmUsuario($id_usuario);
            $vinculoUsuario = $dados['usuario']->vinculoUsuario;
            $matricula = $dados['usuario']->matriculaUsuario;
            if ($matricula == "20151041110110") {
                redirect("professor/home");
            }
            else{
                redirect("aluno/homeAluno");
            }
            /*if ($vinculoUsuario == "Aluno") {

				redirect("aluno/homeAluno");
			}
            else{
                redirect("professor/home");
            }*/
            
        }
        else{ 
        	$this->User_model-> nomeUsuario = $nome;
			$this->User_model-> matriculaUsuario = $matricula;
			$this->User_model-> vinculoUsuario = $vinculo;
			$this->User_model->salvarUsuario();
			
			$u = $this->User_model->verificarMatriculaEVinculo($matricula, $vinculo);
            $this->session->set_userdata("usuario", $u);
            $id_usuario = $this->session->userdata("usuario")->id_usuario; 
            $dados['usuario'] = $this->User_model->recuperarUmUsuario($id_usuario);
            $vinculoUsuario = $dados['usuario']->vinculoUsuario;
            $matricula = $dados['usuario']->matriculaUsuario;
            if ($matricula == "20151041110110") {
                redirect("professor/home");
            }
            else{
                redirect("aluno/homeAluno");
            }
           /* if ($vinculoUsuario == "Aluno") {

				redirect("aluno/homeAluno");
			}
            else{
                redirect("professor/home");
            }*/
		
        }

        

	}
    public function sair(){
        $this->session->unset_userdata("usuario");
        redirect("pages/login");
    }

}