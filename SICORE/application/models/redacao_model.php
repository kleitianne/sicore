<?php
	class Redacao_model extends CI_Model
	{
		public $id;
		

		public function __construct()
		{
			parent::__construct();
            $this->load->database();
		}

		public function inserirRedacao()
		{
			$dados = array(
				"nomeArquivo"=>$this->nomeArquivo,
				"fk_evento"=>$this->fk_evento,
				"fk_usuario"=>$this->fk_usuario,
				"notaGeral"=>$this->notaGeral
				); 
			return $this->db->insert('redacao', $dados);
		}

		public function recuperarTipoDeCriterio($id){
            $this->db->where("id_tipoDeCriterio", $id);
            return $this->db->get('tipodecriterio')->result();
		}
		public function ultimoIdRedacao()
		{
			return $this->db->insert_id('redacao');
		}

		public function recuperarRedacoesEvento($id){
            $this->db->where('fk_evento', $id);
            return $this->db->get('redacao')->result();
		}

		public function recuperarUmaRedacao($id){
	        $this->db->where('id_redacao', $id); 
	        $query = $this->db->get('redacao');
	        return $query->row();
    	}

		public function recuperarCriterio($id){
            $this->db->where('fk_tipoDeCriterio', $id); 
            return $this->db->get('criterio')->result();
		}

		public function recuperarAvaliacao($id, $user){
			$this->db->where('fk_avaliador', $user); 
            $this->db->where('fk_redacao', $id); 
            
            return $this->db->get('avaliacao')->result();
		}

		public function recuperarAvaliacoes($id){
            $this->db->where('fk_redacao', $id); 
            return $this->db->get('avaliacao')->result();
		}

		public function recuperarUmaRedacaoMinhasRedacoes($id, $id_user){
	        $this->db->where('fk_evento', $id);
	        $this->db->where('fk_usuario', $id_user); 
	        $query = $this->db->get('redacao');
	        return $query->row();
    	}

    	public function verificarUmaRedacao($id, $id_user){
	        $this->db->where('fk_evento', $id); 
	        $this->db->where('fk_usuario', $id_user); 
	        $query = $this->db->get('redacao');
	        return $query->row();
    	}

    	public function recuperarRedacoesRanking($idEvento){
    		$this->db->select_max('notaGeral'); 
	        $this->db->where('fk_evento', $idEvento);
	        $this->db->limit(3);
	        $query = $this->db->get('redacao');
	        return $query->row();	        
    	}
}
?> 