<?php
  $index = true;
  include_once("config.php");
  if(isset($_REQUEST['username'])){
    include_once("control.php");
  }
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
  	<link rel="stylesheet" type="text/css" href="js/jquery-ui-1.12.1/jquery-ui.min.css">
  	<link rel="stylesheet" type="text/css" href="css/loading.css">
  	<link rel="stylesheet" type="text/css" href="css/styles2.css">
  	<link rel="stylesheet" type="text/css" href="css/sweetalert.css">
  	<link rel="icon" href="img/favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Saira+Semi+Condensed" rel="stylesheet">
  	<script type="text/javascript" src="js/jquery-3.2.1.js"></script>
  	<script type="text/javascript" src="js/jquery-ui-1.12.1/jquery-ui.min.js"></script>
  	<script type="text/javascript" src="js/bootstrap.js"></script>
  	<script type="text/javascript" src="js/sweetalert.js"></script>
  	<script src="js/loading.js"></script>
  	<meta charset="utf-8">
  	<title>TSUKUYOMI STORE | CATALOGO</title>
  </head>
  <body class="catalogo">

    <div class="row">
      <div id="menu" class="col-md-2 col-sm-2 text-left">
          <a href="index.php"><h3>tsukuyomi</h3></a>
          <br>
          <?php include_once("link.php"); ?>
      </div>
      <div class="col-md-8 col-sm-8 text-left">
            <div class="catalog">
             <!-- <a href="#ilusModal" data-toggle="modal" data-target="#ilusModal">"ILUSTRACION BELLA Y HERMOSA" <br> CLICKEAME PUES! </a>-->
            <div class="row catalogo">
              
            </div>
            </div>
      </div>
    </div>
    <?php include_once("modals.php"); ?>
    <script type="text/javascript">
      $(document).ready(function(){
        
        
        if(location.href!="https://diplomado-cuatro.c9users.io/catalogo.php"){
          $('[data-target="#logModal"]').click(function(e){
            
            $("#logModal").modal("show");
            
          });
          
        }
      })
      
    </script>
<script type="text/javascript">
if(location.href=="https://diplomado-cuatro.c9users.io/catalogo.php"){
  let audio = new Audio("fire2.mp3");
  $(document).ready(function(){
    
    $('[data-target="#logModal"]').click(function(){
      audio.onended = function(){
        $("#logModal").modal("show");
      }
      audio.ontimeupdate =function(){
        if(this.currentTime > 1.884274)$("#logModal").modal("show");
      }
      audio.play();
    });
  	
  });
}
</script>
<script type="text/javascript" src="js/catalogo.js"></script>
  </body>
</html>
