 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="background-color: #ffff;">
    <!-- Content Header (Page header) -->
    <section class="content-headerr box14">
      
        <b class="tit">Enviar redação sobre <?=$evento->temaEvento?></b> 
      
      
    </section>
    <hr class="linha">

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div style=" width: 50vw; margin-left: auto; margin-right: auto;">
        <div class="orientacoes form-group">
          <h3 style="margin-bottom: 30px;"><b>Orientações:</b></h3>
          <p>Leia com atenção os textos motivadores e a proposta de redação.</p>
          <p>A redação que apresentar cópia dos textos da proposta terá o número de linhas copiadas desconsiderado para efeito de correção.</p>
          <b style="font-size: 17px;">Receberá nota zero, em qualquer das situações expressas a seguir, a redação que:</b>
          <lu>
            <li style="margin-top: 20px;">tiver até 7 (sete) linhas escritas, sendo considerada "texto insuficiente";</li>
            <li>fugir ao tema ou que não atender ao tipo dissertativo-argumentativo;</li>
            <li>apresentar parte do texto deliberadamente desconectada do tema proposto.</li>
          </lu>
          <b style="font-size: 17px;"> Textos motivadores: </b>
            <a style="color: #2dbe60; font-size: 16px;" target="_blank"  href="<?=base_url()?>pages/recuperarTextoMotivador/<?=$evento->id_evento?>">Arquivo <i class="glyphicon glyphicon-download-alt"></i>
            </a> <br>
          

          <!--<p>1º Leia com atenção os textos motivadores e a proposta de redação.</p>
          <p>2º Redija seu texto de acordo com a norma culta padrão da língua portuguesa.</p>
          <p>3º Elabore uma proposta de intervenção que respeite os direitos humanos.</p>-->
        </div>
          <div class="form-group" style="padding-top: 4%;">
          <label style="font-size: 17px;">Escreva sua redação ou selecione um arquivo</label>
          

        </div>
      
      <form action="<?=base_url()?>aluno/gerarpdf" method="post">
      <div class="gerar form-group">
        <textarea required="" class="form-control" name="textos" rows="8" style="font-size: 17px; width: 50vw;" placeholder="Escreva aqui sua redação e gere o pdf."></textarea> 
        <button type="submit"  class="btn btn-primary pull" style="display:inline; background:transparent; text-decoration: none; border: none; cursor: pointer; color: #00f; margin-bottom: 20px; margin-top: 20px; margin-left: 0; padding: 0;">Gerar PDF</button> <br>
      </div>
      </form>
      <form action="<?=base_url()?>aluno/enviarRedacao/<?=$evento->id_evento?>" method="post" enctype="multipart/form-data">   
      <div class="enviar form-group"> 
        <input required class="a file" type="file" name="redacao" id="redacao" accept=".pdf"> <br>
        <button type="submit" class="btn-sicore btn btn-block btn-sucess pull">Submeter redação</button>
      </div>
      </form>
     
</div>
      
      
    </section>
    <!-- /.content -->
  </div>

<!-- ./wrapper -->
