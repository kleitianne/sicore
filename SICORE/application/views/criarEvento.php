  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-headerr box14" >
        <b class="tit">Criar evento</b>
      
    </section>
    <hr class="linha">

    <!-- Main content -->
  <section class="content" style="">
    <div style="" class="resp-criar">
    <div style="background-color: red; color: white; border-radius: 5px; padding-left: 0.5em; margin-bottom: 1em;"><?= $this->session->flashdata("msg");?></div>
      <form role="form" action="<?=base_url()?>professor/salvarEvento" method="post" enctype="multipart/form-data">
          
        <div class="form-group">
          <label class="titulo-sicore" for="">Nome do evento:</label>
          <input  required type="text" class="form-control form-evento" id="nome" name ="nome">
        </div>

        <div class="form-group">
          <label class="titulo-sicore" for="">Tema proposto:</label>
          <input  required type="text" class="form-control form-evento" name="tema">
        </div>

        <div class="form-group">
          <label class="titulo-sicore" for="">Duração do evento:</label> <br>
          Início: <input  required type="date" name="inicio">
          Fim: <input required  type="date"  name="fim">
        </div>
        <div class="form-group form-evento">
      <label class="titulo-sicore"for="">Professores participantes:</label> <br>
      <b>Obs.:</b> <p style="display:inline-block; font-size: 15px;">Selecione um número par de professores</p>
        <div class="alert part form-evento">

          
          <?php
          foreach ($professor as $p) {
           
          ?>

          <div class="form-group">
            <input type="checkbox" value="<?=$p->id_usuario?>" name="professor[]"> <label><?=$p->nomeUsuario?></label>
            </select> <br>
          </div>
          <?php 
         }
          ?>
        </div>

        <div class="">
          <label class="titulo-sicore" for="">Citérios de correção:</label> <br>
          <input type="radio" id="criterio" value="1" name="criterio"> ENEM
          <input type="radio" id="criterio" value="2" name="criterio" style="margin-left: 2em;"> IFRN
        </div>

        <div class="">
          <label class="titulo-sicore" for="">Textos motivadores:</label><br>
          <b style="margin-bottom: 15px;">Obs.:</b> <p style="display:inline-block; font-size: 15px;">Todos os textos devem estar em um único arquivo pdf</p> <br>

          <input required  type="file"  name="textos" id="textos" accept=".pdf">  
               
        </div>

        <input type="text" id="professor" name="professor" placeholder="Digite o nome" />
        <button type="submit" class="btn-sicore btn btn-block btn-sucess pull" style="margin-top: 35px;">Criar</button>
        </form>
      </div>
      
      </div>
    </div>
    </div>
  </section>

</div>
<script type="text/javascript">
  document.getElementById("uploadBtn").onchange = function () {
    document.getElementById("uploadFile").value = this.value;
};
</script>
<!-- ./wrapper -->




