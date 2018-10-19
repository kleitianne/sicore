  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-headerr box14" >
        <b class="tit">Editar evento</b>
      
    </section>
    <hr class="linha">
    <!-- Main content -->
  <section class="content">
    <div style=" width: 50vw; margin-left: 320px; margin-right: auto;">
      <form role="form" action="<?=base_url()?>professor/atualizarEvento/<?=$evento->id_evento?>" method="post" enctype="multipart/form-data">
          
        <div class="form-group">
          <label class="titulo-sicore" for="">Nome do evento:</label>
          <input  required type="text" style="width:650px;" class="form-control" id="nome" name ="nome" value="<?=$evento->nomeEvento?>">
        </div>

        <div class="form-group">
          <label class="titulo-sicore" for="">Tema proposto:</label>
          <input  required type="text" class="form-control" style="width:650px;" name="tema" value="<?=$evento->temaEvento?>">
        </div>

        <div class="form-group">
          <label class="titulo-sicore" for="">Duração do evento:</label> <br>
          Início: <input  required type="date" name="inicio" value="<?=$evento->dataInicio?>">
          Fim: <input required  type="date"  name="fim" value="<?=$evento->dataFim?>">
        </div>
      <label class="titulo-sicore form-group" for="">Professores participantes:</label> <br>
        <div class="alert form-group" style="width: 650px; margin-left:13px;">

          
          <?php
          foreach ($avaliador as $p) {
           
          ?>
          <div class="form-group">
            <input type="checkbox" value="<?=$p->id_usuario?>" name="professor[]"> <label><?=$p->nomeUsuario?></label>
           <br>
          </div>
          <?php 
         }
          ?>
        </div>

        <div class="form-group">
          
          <input class="form-group" type="hidden" id="criterio" value="<?=$evento->fk_tipoDeCriterio?>" name="criterio">
        </div>

        <div class="form-group">
          

          <input  disable type="hidden" value="<?=$evento->nomeArquivoMotivador?>" name="textos" id="textos" accept=".pdf">            
        </div>

      <button type="submit" class="btn-sicore btn btn-block btn-sucess pull" style="margin-left:13px;">Editar</button>
        </form>
      </div>
      
      </div>
    </div>
    </div>
  </section>

</div>

<!-- ./wrapper -->


