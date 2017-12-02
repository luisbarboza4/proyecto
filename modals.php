<div class="modal fade" id="ilusModal" role="dialog">
    <div class="modal-dialog modal-lg">
<!--
0: el usuario le dio comprar esa mielda y la coña es medio tapada y lo tienen pendiente porque no lo ha hecho
1: milagrosamente logro hacer esa mielda (pa ser ilustradora tapada le echo bola)
2: el usuario monto la imagenes en el carrito pero esta esperando que el dolar baje y los precios bajen para darle a comprar
  -->
      <!-- Modal content--> 
      <div class="modal-content ilumodal" id="modalstyle">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <div class="modal-body">
          <div class="col-md-6">
            <div class="imagenprueba">
                <img class="illus ignore" src="">
            </div>
          </div>
          <div class="col-md-6">
              <h4>Nombre ilustraci&oacute;n</h4>
              <h5 class="name">Impresi&oacute;n</h5>
              <!-- Formulario de Pedido -->
              <form id="pedido" class="pedido" action="catalogo.html" method="post">
                <label for="size">Tama&ntilde;o</label>
                <br>
                <select class="size" name="size">
                  <!-- Traerse las opciones de tamaño -->
                  <option value="">Tabloide</option>
                  <option value="">Carta</option>
                  <option value="">etc</option>
                </select>
                <br><br>
                <label for="supp">Soporte</label>
                <br>
                <select class="supp" name="supp">
                  <!-- Traerse las opciones de tamaño -->
                  <option value="">Cartulina</option>
                  <option value="">Opalina</option>
                  <option value="">etc</option>
                </select>
                <br><br>
                <label for="cantidad">Cantidad</label>
                <br>
                <input class="cantidad" type="number" name="cantidad" value="" min="1" max="10">
                <br><br>
                <div align="center" class="row">
  								<div class="col-xs-2">
  									<span style="margin-right: 2px;" id="numberlike">0 </span><span id="thumbsup" class="glyphicon glyphicon-thumbs-up"></span>
  								</div>
  								<div class="col-xs-2">
  									<span style="margin-right: 2px;" id="numberdislike">0 </span><span id="thumbsdown" class="glyphicon glyphicon-thumbs-down"></span>
  								</div>
  								<input id="id_img_m" style="display:none" type="text" value=""/>
							  </div>
                <br><br><br>
                <!-- Traerse el cálculo del precio según la cantidad -->
                <h4><span id="precio">Precio</span>BsF + envio</h4>
                <br>
                <?php
                global $user;
                if(isset($user)){
                  echo '<button id="addCarrito" type="submit" name="submit">agregar al Carrito</button>';
                }
                else{
                  echo "<p>Debes iniciar sesi&oacuten para agregar al carrito <p>";
                }
                ?>

              </form>
          </div>
        </div>
      </div>

    </div>
  </div>

  <div class="modal fade" id="logModal" role="dialog">
      <div class="modal-dialog modal-md">

        <!-- Modal content-->
        <div class="modal-content" id="modalstyle">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <div class="modal-body">
            <div class="col-md-12 col-sm-12 text-center login-form">
              <h3 class="logh2">Bienvenido!</h3>
              <h4 class="logh2">Es necesario conectarse para poder realizar pedidos.</h4>
              <br>
              <form id="modalLogin" class="login" action="control.php" method="post">

                <label for="username"> Username </label>
                <br>
                <input type="text" name="username" value="" placeholder="username">
                <br>
                <label for="pass"> Password </label>
                <br>
                <input type="password" name="password" value="" placeholder="password">
                <br><br>
                <input id="loginBTN" type="button" value="Entrar" class="btn elim">
                <a href="registro.php"><button type="button" name="button" class="btn elim">Registrarse</button></a>
                <br><br>
                <a href="recuperar.php" class="recover">Recuperar Contrase&ntilde;a</a>
                
                <div style="display:none" id="mensajeError" class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 text-center mensajeError"></div>
                <div style="display:none" id="cargandoLogin" class='contain'>
                  <svg height='80' width='210'>
                    <ellipse cx='25' cy='20' fill='none' rx='10' ry='10'></ellipse>
                  </svg>
                  <svg height='80' width='210'>
                    <ellipse cx='25' cy='20' fill='none' rx='10' ry='10'></ellipse>
                  </svg>
                  <svg height='80' width='210'>
                    <ellipse cx='25' cy='20' fill='none' rx='10' ry='10'></ellipse>
                  </svg>
                  <svg height='80' width='210'>
                    <ellipse cx='25' cy='20' fill='none' rx='10' ry='10'></ellipse>
                  </svg>
                  <svg height='80' width='210'>
                    <ellipse cx='25' cy='20' fill='none' rx='10' ry='10'></ellipse>
                  </svg>
                  <svg height='80' width='210'>
                    <ellipse cx='25' cy='20' fill='none' rx='10' ry='10'></ellipse>
                  </svg>
                  <svg height='80' width='210'>
                    <ellipse cx='25' cy='20' fill='none' rx='10' ry='10'></ellipse>
                  </svg>
                  <svg height='80' width='210'>
                    <ellipse cx='25' cy='20' fill='none' rx='10' ry='10'></ellipse>
                  </svg>
                  <svg height='80' width='210'>
                    <ellipse cx='25' cy='20' fill='none' rx='10' ry='10'></ellipse>
                  </svg>
                  <svg height='80' width='210'>
                    <ellipse cx='25' cy='20' fill='none' rx='10' ry='10'></ellipse>
                  </svg>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      </div>
    </div>
