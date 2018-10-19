 <div class="content-wrapper">
    <section class="content-headerr box14" >
        <b class="tit">Eventos arquivados</b>
      
    </section>
    <hr class="linha">
  <section class="content">
    <div class="row">
      <?php
        foreach ($evento as $e) {?>
      <div class="col-md-3">
        <div class="box box-success box-solid">
          <div class="box-body with-border">
            <h4><b><?=$e->nomeEvento?></b></h4>
            <p><b>Tema:</b> <?=$e->temaEvento?></p>
            
          </div>
          <a href="<?=base_url()?>professor/verEventosArquivados/<?=$e->id_evento?>" class="box-header">
            <h5 class="box-title">
            <small href="">Ver evento</small>
            </h5>
          </a>
        </div>
      </div>
    <?php    
    }
  ?> 
      
  </section>
</div>
<script src="<?=base_url();?>assets/js/funcionalidades.js"></script>