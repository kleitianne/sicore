 <div class="content-wrapper">
    <section class="content-headerr box14" >
        <b class="tit">Bem-vindo(a), <span class="usuario-nome_usual"> </span></b>
      
    </section>
    <hr class="linha">

  <section class="content">

    <b style="font-size: 20px; padding-bottom: 10em;"><?= $this->session->flashdata("msg");?></b>
      <div class="row">

      <?php
        foreach ($eventos as $e) {?>
      <div class="col-md-3">
        <div class="box box-success box-solid">
          <div class="box-body with-border">
            <b>Evento:</b> <?=$e->nomeEvento?> <br>
            <b>Tema:</b> <?=$e->temaEvento?> <br>
            <?= $this->session->flashdata("msg");?>
            <b>Início: </b> <?=date('d/m/Y', strtotime($e->dataInicio))?><br> 
            <b>Fim: </b> <?=date('d/m/Y', strtotime($e->dataFim))?><br>
          </div>
          <a href="<?=base_url()?>aluno/verificarRedacao/<?=$e->id_evento?>" class="box-header">
            <h5 class="box-title">
            <small href="">Submeter redação</small>
            </h5>
          </a>
        </div>
      </div>
    <?php    
    }
  ?> 
  </section>
</div>

