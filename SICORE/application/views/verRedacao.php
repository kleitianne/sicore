 <div class="content-wrapper">
    <section class="content-headerr box14" >
        <b class="tit">Suas redações</b>
      
    </section>
    <hr class="linha">
  <section class="content">
    <div class="row">
      <?php
        foreach ($evento as $e) {?>
      <div class="col-md-3">
        <div class="box box-success box-solid">
          <div class="box-body with-border">
            

            <h4><b>Tema: </b><?= $e->temaEvento?></h4>

            <p><b>Situação:</b> esperando correção</p>
          </div>
          <a href="verRedacao/<?= $e->id_evento?>" class="box-header">
            <h5 class="box-title">
            <small href="">Ver Redação</small>
            </h5>
          </a>
        </div>
      </div>
    <?php    
    }
  ?>
  </section>
</div>