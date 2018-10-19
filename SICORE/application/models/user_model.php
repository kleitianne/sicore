<?php
	class User_model extends CI_Model
	{
		public $id;
		public $nomeUsuario;
		public $vinculoUsuario;
		public $matriculaUsuario;

		public function __construct()
		{
			parent::__construct();
            $this->load->database();
		}
		public function salvarUsuario(){
            $dados = array(
				"nomeUsuario"=>$this->nomeUsuario,
				"vinculoUsuario"=>$this->vinculoUsuario,
				"matriculaUsuario"=>$this->matriculaUsuario
				
				);
			return $this->db->insert('usuario', $dados);
    	}
		public function recuperarProfessor($id){
            $this->db->where('id_usuario', $id); 
	        $query = $this->db->get('usuario');
	        return $query->row();
    	}
    	public function recuperarUmUsuario($id){
            $this->db->where('id_usuario', $id); 
	        $query = $this->db->get('usuario');
	        return $query->row();
    	}
    	public function verificarMatriculaEVinculo($matricula,$vinculo){
	        $this->db->where("matriculaUsuario", $matricula);
	        $this->db->where("vinculoUsuario", $vinculo);
	        $r = $this->db->get("usuario"); 
	        return $r->row();
    	}
    	public function recuperarTodosOsProfessores($id){
    		$this->db->select("* FROM usuario WHERE id_usuario <> '$id' AND vinculoUsuario = 'Professor' ORDER BY nomeUsuario ASC");
        	 return $this->db->get()->result();
    	}

    	public function recuperarProfessorEvento($id){
    		$this->db->select("*
                FROM usuario
                INNER JOIN avaliadores
                ON avaliadores.fk_usuario = usuario.id_usuario
                WHERE fk_evento = '$id'
                ORDER BY usuario.nomeUsuario DESC
                ");
        return $this->db->get()->result();
    	}

    	public function recuperarAlunosEvento($id){
    		$this->db->select("*
                FROM usuario
                INNER JOIN participantes
                ON participantes.fk_usuario = usuario.id_usuario
                WHERE fk_evento = '$id'
                ORDER BY usuario.nomeUsuario DESC
                ");
        return $this->db->get()->result();
    	}

        public function recuperarAvaliador($id){
            $this->db->select("*
                FROM usuario
                INNER JOIN avaliadores
                ON avaliadores.fk_usuario = usuario.id_usuario
                INNER JOIN avaliacao
                ON avaliadores.fk_usuario = avaliacao.fk_avaliador
                WHERE fk_avaliador = '$id'
                ORDER BY usuario.nomeUsuario DESC
                ");
        return $this->db->get()->result();
        }
	} 

?>
