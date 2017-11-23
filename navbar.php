<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="index.php">WebSite</a>
	      	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        </button>
	    </div>
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	    <ul class="nav navbar-nav navbar-right">
	      <li><a href="index.php">Inicio</a></li>
	      <?php
	      	if ($user){
	      	?>
	      <li class='dropdown' style='float: left'>
	      	  <a class='dropdown-toggle' data-toggle='dropdown' role='button'>Configuración<span class='caret'></span></a>
		      <ul class='dropdown-menu' style='background-color: #e7e7e7;min-width: 80px'>
			      <li><a href='imagenes.php'>Imagenes</a></li>
			      <li><a href='configuration.php?type=size'>Tamaño</a></li>
			      <li><a href='configuration.php'>Soporte</a></li>
		      </ul>
	      </li>
	    	<?php
	      		echo "<li><li class='dropdown' style='float: left'><a style='font-size: initial' class='dropdown-toggle' data-toggle='dropdown' role='button'><span class='glyphicon glyphicon-user'></span>".$user['nombre']."<span class='caret'></span></a><ul class='dropdown-menu' style='background-color: #e7e7e7;min-width: 80px'><li><a href='salir.php'>Salir</a></li></ul></li></li>";
	      	
	      	}
	      	?>
	    </ul>
	  </div>
	  </div>
	</nav>