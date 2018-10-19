<?php
	class Evento_model extends CI_Model
	{
		public $id_evento;

		public function __construct()
		{
			parent::__construct();
            $this->load->database();
		}

		public function inserirEvento()
		{
			$dados = array(
				"nomeEvento"=>$this->nome,
				"temaEvento"=>$this->tema,
				"dataInicio"=>$this->inicio,
				"dataFim"=>$this->fim,
				"ativo"=>$this->ativo,
				"fk_tipoDeCriterio"=>$this->criterio,
				"nomeArquivoMotivador"=>$this->textoM,
				"fk_usuario"=>$this->fk_usuario
				
				);
			return $this->db->insert('evento', $dados);
		}
		public function recuperarUmEvento($id){
	        $this->db->where('id_evento', $id); 
	        $query = $this->db->get('evento');
	        return $query->row();
    	}
		public function recuperarEvento(){
			$this->db->order_by('nomeEvento', 'asc');
            $this->db->select("*"); 
            $this->db->where('ativo', '1');
            return $this->db->get('evento')->result();
		}
		public function recuperarTipoDeCriterio($id){
	        $this->db->where('id_tipoDeCriterio', $id); 
	        $query = $this->db->get('tipoDeCriterio');
	        return $query->row();
    	}

    	public function recuperarAvaliadores($id){
    		$this->db->where('fk_evento', $id); 
	        $query = $this->db->get('avaliadores');
	        return $query->row();
    	}

    	public function ultimoIdEvento()
		{
			return $this->db->insert_id('evento');
		}

		public function inserirAvaliadores()
		{
			$dados = array(
				"fk_usuario"=>$this->fk_usuario,
				"fk_evento"=>$this->fk_evento
				
			);
			return $this->db->insert('avaliadores', $dados);
		}

		public function inserirParticipante()
		{
			$dados = array(
				"fk_usuario"=>$this->fk_usuario,
				"fk_evento"=>$this->fk_evento
				
			);
			return $this->db->insert('participantes', $dados);
		}

		public function updateEvento($id,$dados){
        
        	$this->db->where('id_evento', $id); 
        	$this->db->update('evento', $dados);
    	}

    	public function recuperarEventoArquivado(){
			$this->db->order_by('nomeEvento', 'asc');
            $this->db->select("*"); 
            $this->db->where('ativo', '0');
            return $this->db->get('evento')->result();
		}

		public function recuperarEventoAluno($user){		
			$this->db->select("* FROM redacao 
				INNER JOIN evento 
				ON redacao.fk_evento = evento.id_evento 
				WHERE redacao.fk_usuario = '$user'
		");

		return $this->db->get()->result();
    }
    		
	}
?>