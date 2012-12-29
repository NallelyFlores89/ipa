<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		
		<script src="<?=base_url();?>static/bootstrap/js/jquery-1.7.1.min.js"></script>
		<script src="<?=base_url();?>static/bootstrap/js/bootstrap.min.js"></script>
		<link href="<?=base_url();?>static/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
		<link href="<?=base_url();?>static/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
		<link href="<?=base_url();?>static/bootstrap/css/bootstrap-responsive.css" rel="stylesheet" media="screen">
		<link href="<?=base_url();?>static/bootstrap/css/css.css" rel="stylesheet" media="screen">
		 
	</head>
	
	<body>
	    <div class="container">
			<div class="page-header">
				<h1>Laboratorios de Docencia CBI<br>
			    <small>Buzón</small></h1>
		    </div>
		    
		    <div class="span12">
		    	<div class="span2"></div>
			    <ul class="thumbnails span10">
					<li class="span3">
						<a href="#" class="thumbnail">
							<label>Buzón</label>
							<img src="<?=base_url();?>static/img/buzon.jpg" alt="">
						</a>
					</li>
					<li class="span3">
						<a href="#" class="thumbnail">
							<label>Comentarios por categorías</label>
							<img src="<?=base_url();?>static/img/categorias.png" alt="">
						</a>
					</li>
					<li class="span3">
						<a href="#" class="thumbnail">
							<label>Comentar</label>
							<img src="<?=base_url();?>static/img/coment.png" alt="">
						</a>
					</li>
				</ul>
				<div class="span1"></div>
			</div>
		  
		  	<!--Lista de comentarios-->
		  	<div class="span12 comentarios">
		  		<?php 
		  		foreach ($comentarios as $indice=>$value) { 
		  			switch ($value['categoria_id']) {
						  case 1:
							  $categoria='Servicio';
							  break;
						  case 2:
							  $categoria='Software';
							  break;
						  case 3:
							  $categoria='Acceso a red';
							  break;
						  case 4:
							  $categoria='Otro';
					  }
		  			
		  			?>
		  
				  	<div class="span11 <?="categoria".$value['categoria_id']?>">
				  		<label class="fecha span8"><?=$value['fecha'] ?></label>
				  		<label class="categoria span2"><?= $categoria ?></label><br><hr />
				  		<label class="remitente span12"><?= $value['nombre']?> dice:</label>
				  		<p class="span9"><?php print_r($value['comentarios']); ?></p>
					  	<div class="span1">
					  		<a href="#" class="label label-success" onclick="responde_comentario(<?=$value['id'] ?>)">Responder</a>
					  	</div>
					  	<?php if ($respuestas[$value['id']]==-1){?>

							<div class="accordion span9" id="accordion1">
								<div class="accordion-group">
									<div class="accordion-heading">
										<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapseOne">
											No hay respuestas
										</a>
									</div>
									<div id="collapseOne" class="accordion-body collapse">
										<div class="accordion-inner">
										</div>
									</div>
								</div>
							</div>

					  	<?php }else{ ?>
							<div class="accordion span9" id="accordion2">
								<div class="accordion-group">
									<div class="accordion-heading">
										<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
											Hay respuestas
										</a>
									</div>
									<div id="collapseTwo" class="accordion-body collapse">
										<div class="accordion-inner">
											<?php foreach($respuestas[$value['id']] as $value){ ?>
												<label class="fecha"><?=$value['fecha'] ?></label>
										  		<label class="remitente"><?= $value['nombre']?> dice:</label>
										  		<p class="span9"><?php print_r($value['respuesta']); ?></p>
										  		<br>
												<hr>
											<?php } ?>
										</div>
									</div>
								</div>
							</div>					  	
						<?php } ?>
				  	</div>

				 <?php } ?>
			</div>
			
			<!--email box -->
			<br>
			<div class="span12"
	      		<label class="span12">Déjanos un comentario. Estaremos gustosos de saber tu opinión</label>
	      		
		  	</div>	    	
    	</div> <!-- /container -->
	
	</body>
	
</html>