<?php
	class Avaliacao_model extends CI_Model
	{
		public $id;
        public $fk_tipoDeCriterio;
        public $fk_redacao;
        public $fk_avaliador;

		public function __construct()
		{
			parent::__construct();
            $this->load->database();
		}
        public function salvarAvaliacao(){
            $dados = array(
                "fk_avaliador"=>$this->fk_avaliador,
                "fk_redacao"=>$this->fk_redacao,
                "fk_tipoDeCriterio"=>$this->fk_tipoDeCriterio
                
                );
            return $this->db->insert('avaliacao', $dados);
        }
        public function recuperarAvaliador($id,$evento){
            $this->db->where('fk_usuario', $id); 
            $this->db->where('fk_evento', $evento); 
            $this->db->limit(1);
            $query = $this->db->get('avaliadores');
            return $query->row();
        }
        public function ultimoIdAvaliacao()
        {
            return $this->db->insert_id('avaliacao');
        }

         public function salvarAvaliacaoCriterio(){
            $dados = array(
                "fk_avaliacao"=>$this->fk_avaliacao,
                "fk_criterio"=>$this->fk_criterio,
                "comentario"=>$this->comentario,
                "nota"=>$this->nota
                
                );
            return $this->db->insert('avaliacaocriterio', $dados);
        }

        public function recuperarNota($id){
            $this->db->select("*
                FROM avaliacaocriterio
                INNER JOIN avaliacao
                ON avaliacao.id_avaliacao = avaliacaocriterio.fk_avaliacao
                WHERE fk_redacao = '$id'
                ");
            return $this->db->get()->result();
        }
	} 

?>
