<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-headerr box14" >
    <b class="tit">Corrigir redação <?=$num_redacao?></b>
    
  </section>
  <hr class="linha">

  <!-- Main content -->
  <section class="content sim" >

    <p>Redação:</p> 
    <embed src="<?=base_url();?>assets/redacoes/<?=$redacao->nomeArquivo?>" width="100%" height="700" type='application/pdf'>
      <div class="caixa resp-redd" style="margin-top:80px;">
        <form action="<?=base_url();?>professor/avaliarRedacao" method="post">
          <?php
          $num_criterio = 0;
          foreach ($criterio as $c) {
            $num_criterio = $num_criterio + 1;

            ?>
            <div class="bloco"  >
              <div class="n-crit" style="color: white;"><b ><?=$num_criterio?>º</b></div>
              <div class="crit seta-direita" style="color: #333333;"><?=$c->nomeDoCriterio?></div>
              <div class="notas" align="center">
                <b style="color: #333333;">Nota:</b><br>
                <input type="number" class="form-input input-num" name="nota">
              </div>
            </div>
            <?php
          }
          ?>   
          <div class="" style="padding-top:50px;">
            <textarea required="" class="form-control form-red" name="textos" rows="8" style="font-size: 17px;" placeholder="Deixe comentários gerais da redação"></textarea> 
            
          </div>
          <input type="hidden" name="fk_evento" value="<?=$evento->id_evento?>">
      <input type="hidden" name="fk_redacao" value="<?=$redacao->id_redacao?>">
          <button type="submit"  class="btn-sicore btn btn-block btn-sucess pull" style="margin-top:50px;">Enviar correção</button> <br>
        </form>  

      </div>    
    </section>

  </div>


