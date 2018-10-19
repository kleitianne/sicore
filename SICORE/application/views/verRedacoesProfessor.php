<!--<div class="elemento">
		<div class="quadrado"><p class="n-redacao">001</p></div>
		<div class="triangulo"></div>
	</div> --> 
 Redações do evento <?=$evento->nomeEvento?> 
 <div class="content-wrapper">
    <section class="content-headerr box14" >
        <b class="tit">Redações do evento <?=$evento->nomeEvento?></b>
     
    </section>
    <hr class="linha">
 	<section class="content">

<?php
	$num_redacao = 0;
	foreach ($redacao as $r) {
	$num_redacao = $num_redacao + 1;
	
?>
	<div class="el">
		<div class="left">
			<p class="n-red"><?=$num_redacao?></p>
		</div>
		<div class="right">
			<div class="e-1">
				<p class="texto">Discrepância</p>
				<img class="dis" src="<?=base_url();?>assets/img/warning.png">
			</div>
			<div class="e-2">
				<p class="texto">Sua nota</p>
				<div class="n">700</div>
			</div>
			
			<div class="e-3">
				<div class="right">
					<!--<img class="icon-prof" src="<?=base_url();?>assets/img/user.png">-->
					<p class="prof">Professores</p>
					
					<!--foreach com o nome dos profs-->
					<img class="icon-prof left" src="<?=base_url();?>assets/img/user.png">
					<p class="corretor"></p>
					
				</div>
			</div>
			
		</div>
		<a href="<?=base_url();?>professor/verificarRedacao/<?=$evento->id_evento?>/<?=$r->id_redacao?>/<?=$num_redacao?>"><button class="b-corrigir">Corrigir redação</button></a>
	</div>
<?php
	}
?>
</section>
</div>