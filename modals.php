<div class="modal fade" id="ilusModal" role="dialog">
    <div class="modal-dialog modal-lg">

      <!-- Modal content-->
      <div class="modal-content" id="modalstyle">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <div class="modal-body">
          <div class="col-md-6">
            <div class="imagenprueba">
              <center>
                <a href="https://placeholder.com"><img src="http://via.placeholder.com/400x450"></a>
              </center>
            </div>
          </div>
          <div class="col-md-6">
              <h4>Nombre ilustracion</h4>
              <h5>impresion</h5>
              <br><br>
              <!-- Formulario de Pedido -->
              <form id="pedido" class="pedido" action="catalogo.html" method="post">
                <label for="size">tamaño</label>
                <br>
                <select class="size" name="size">
                  <!-- Traerse las opciones de tamaño -->
                  <option value="">Tabloide</option>
                  <option value="">Carta</option>
                  <option value="">etc</option>
                </select>
                <br><br>
                <label for="supp">soporte</label>
                <br>
                <select class="supp" name="supp">
                  <!-- Traerse las opciones de tamaño -->
                  <option value="">Cartulina</option>
                  <option value="">Opalina</option>
                  <option value="">etc</option>
                </select>
                <br><br>
                <label for="cantidad">cantidad</label>
                <br>
                <input class="cantidad" type="number" name="cantidad" value="" min="1" max="10">
                <br><br><br>
                <!-- Traerse el cálculo del precio según la cantidad -->
                <h4><span id="precio">Precio</span>BsF + envio</h4>
                <br>
                <button id="addCarrito" type="submit" name="submit">agregar al Carrito</button>
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
              <form class="login" action="catalogo.php" method="post">

                <label for="username"> Username </label>
                <br>
                <input type="text" name="username" value="" placeholder="username">
                <br>
                <label for="pass"> Password </label>
                <br>
                <input type="password" name="pass" value="" placeholder="password">
                <br><br>
                <input type="submit" name="submit" value="Entrar" class="btn elim">
                <a href="registro.php"><button type="button" name="button" class="btn elim">Registrarse</button></a>
                <br><br>
                <a href="recuperar.php" class="recover">Recuperar Contraseña</a>
              </form>
            </div>
          </div>
        </div>
      </div>

      </div>
    </div>
