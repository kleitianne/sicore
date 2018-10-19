  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-headerr" style="text-align: center;">
        <b class="tit" >Evento: </b><p class="tit" style="display: inline-block;"><?=$evento->nomeEvento?></p> <br> <b class="tit" style="padding: 0;">Tema: </b> <p class="tit" style="display: inline-block; padding: 0; margin-right: 25px; margin-top: -5px;"><?=$evento->temaEvento?></p>
    </section>
    <hr class="linha">
   

    <!-- Main content -->
  <section class="content">
    <div class="box-body">

      <div class="alert alert-success alert-dismissible">
        <a href="<?=base_url()?>professor/editarEvento/<?=$evento->id_evento?>" style="padding: 0.5em; color: #00a65a; text-decoration: none; display: inline-block;
  font-size: 16px;" class=" pull-right"><i class=" fa  fa-edit"></i> Editar</a>
      <a href="<?=base_url()?>professor/arquivarEvento/<?=$evento->id_evento?>" style="padding: 0.5em; color: #00a65a; text-decoration: none; display: inline-block;
  font-size: 16px;" class=" pull-right"><i class=" fa  fa-inbox"></i> Arquivar</a>
        
          <b style="">Início: </b> <p style="display: inline-block; font-size: 16px;"><?=date('d/m/Y', strtotime($evento->dataInicio))?></p> <br> 
        <b >Fim: </b> <p style="display: inline-block;
  font-size: 16px;"><?=date('d/m/Y', strtotime($evento->dataFim))?> </p> <br>

      
        <b>Ver textos motivadores: </b>
        <a style="text-decoration: none; color: #333333; display: inline-block;
  font-size: 16px;" target="_blank" href="<?=base_url()?>pages/recuperarTextoMotivador/<?=$evento->id_evento?>">Arquivo 
          <i class="fa fa-file-pdf-o"></i>
        </a>  
<br>
      <b>Tipo de crítério utilizado:</b>  <p style="display: inline-block;
  font-size: 16px;"><?=$criterio->nomeCriterio?> </p>  
      </div>
       <a type="submit" style="width: 760px; margin-left: auto; margin-right: auto;" class="btn-success btn btn-block btn-sucess" href="<?=base_url()?>aluno/alunosParticipantes/<?=$evento->id_evento?>">Ver alunos participantes</a>
        <a style="width: 760px; margin-left: auto; margin-right: auto;" class="btn-success btn btn-block btn-sucess pull" href="<?=base_url()?>professor/professoresParticipantes/<?=$evento->id_evento?>">Ver Avaliadores</a>
        <a type="submit" style="width: 760px; margin-left: auto; margin-right: auto;" class="btn-success btn btn-block btn-sucess pull" href="<?=base_url();?>professor/verificarRedacoes/<?=$evento->id_evento?>">Ver redações</a>
        <a type="submit" style="width: 760px; margin-left: auto; margin-right: auto;" class="btn-success btn btn-block btn-sucess pull" href="<?=base_url();?>professor/rankingEvento/<?=$evento->id_evento?>">Ranking de notas</a>
        <a href="<?=base_url();?>professor/calcularMedia/69">calcularMedia</a>
    </div>

      
  </section>

</div>

<!-- ./wrapper -->


