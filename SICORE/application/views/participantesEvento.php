<div class="content-wrapper">
    <section class="content-headerr box14" >
        <b class="tit">Alunos participantes</b>
      
    </section>
    <hr class="linha">
<section class="content">
    <div class="box-body">
<?php
  foreach ($aluno as $a ) {
?>
<div class="col-lg-3" style="200px !important">
  <!-- small box -->
  <div class="small-box" style="background-color: #00a65a; color: white">
    <div class="inner">
      <h4><?=$a->nomeUsuario?></h4>

      <p><?=$a->matriculaUsuario?></p>
    </div>
    <div class="icon">
     <div class="pull-left image usuario-foto">
          
      </div>
    </div>
    <br>
  </div>
</div>
<?php
}
?>
  </div>

      
  </section>
</div>