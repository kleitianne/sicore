 <div class="content-wrapper">
  <section class="content-headerr box14" >
    <b class="tit">Bem-vindo(a)!</b>
    
  </section>
  <hr class="linha">


  <section class="content">
    <div class="row">
      <?php
      foreach ($evento as $e) {?>
        <div class="col-md-3">
          <div class="box box-success box-solid">
            <div class="box-body with-border">
              <b style="font-size: 18px;">Evento:</b> <p style="display: inline-block;"><?=$e->nomeEvento?></p> <br>
              <b style="font-size: 18px;">Tema:</b> <p style="display: inline-block;"><?=$e->temaEvento?></p> <br>
            </div>
            <a href="<?=base_url()?>professor/verEvento/<?=$e->id_evento?>" class="box-header">
              <h5 class="box-title">
                <small href="">Ver evento</small>
              </h5>
            </a>
          </div>
        </div>
        <?php    
      }
      ?> 
      <div class="col-md-3">
        <div class="box box-success box-solid div-evento">
          
          <a class="btn btn-app" href="<?=base_url()?>professor/criarEvento">
            <i class="fa fa-plus"></i> Criar evento
          </a>
        </div>
      </div>
      
    </section>
  </div>
  <script src="<?=base_url();?>assets/js/funcionalidades.js"></script>
  <script src="<?=base_url();?>assets/js/busca-prof.js"></script>