  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-headerr box14" >
        <b class="tit">Evento: </b><?=$evento->nomeEvento?> <br> <b>Tema: </b><?=$evento->temaEvento?>
      
    </section>
    <hr class="linha">
   
    <!-- Main content -->
    <div class="box-body">
      
      <h3><?= $this->session->flashdata("msg");?></h3>
      <div class="">
        <h4><b>Início: </b> <?=date('d/m/Y', strtotime($evento->dataInicio))?> </h4>
        <h4><b>Fim: </b> <?=date('d/m/Y', strtotime($evento->dataFim))?> </h4> 
     <h4><b>Ver textos motivadores: </b>
      <a target="_blank"  href="<?=base_url()?>pages/recuperarTextoMotivador/<?=$evento->id_evento?>">Arquivo <i class="fa fa-file-pdf-o"></i>
      </a></h4>
    </h4>  
      <h4><b>Modalidade:</b> <?=$criterio->nomeCriterio?> </h4>   
      </div>
      <?php
        foreach ($redacao as $r) {
          if($r->fk_usuario == $usuario->id_usuario){
            $this->session->set_flashdata("msg", "Você já submeteu uma redação a este evento");
          }
          else{
            echo "";
          }
        }
      ?>
       
<a class='btn-success btn btn-block btn-sucess' href='<?=base_url()?>aluno/submeterRedacao/<?=$evento->id_evento?>'>Submeter Redação</a>
    </div>

      </div>
  </section>

</div>

<!-- ./wrapper -->


