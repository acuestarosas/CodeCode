<!DOCTYPE html>
<head>
  <title> &#128722;  &#128722;  &#128722; </title>
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>css/estilos.css" media="screen"/>
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>css/960.css" media="screen"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
  </head>

<body>
  <center><h2  class="display-1"><strong>&#128722;   CARRITO DE COMPRAS   &#128722;   </strong> </h2> </center> <hr>
   <center><strong><h2 display-1 ></h2>

<h1>DEBE REGISTRARSE PRIMERO PARA REALIZAR SU COMPRA CON PAYPAL</h1><br>

     <form method="post" action="<?php echo base_url(); ?>tienda/index">
         <button class="button"><span>Ver Cátalogo &#128722;  &#128722;</span></button><br>
     </form>

     <form method="post" action="<?php echo base_url(); ?>main/index">
       <div class="form-group">
         <button class="button"  type="submit" name="insert" value="Registrese"><span>Registrarse</span></button><br>
       </div>
     </form>

<div class="container_12">
<br><h2 align="center" class="bg-primary text-white" > LISTADO DE PRODUCTOS EN SU CARRITO &#128526; &#128722;</h2>

              <?php
              if ($carrito = $this->cart->contents()) {
                  ?>
                  <div class="grid_6" id="contenidoCarrito">
                      <div class="grid_8" id="head_cart">
                          <div class="grid_2">Nombre</div>
                          <div class="grid_2">Precio</div>
                          <div class="grid_2">Cantidad</div>
                          <div class="grid_1">Eliminar</div>
                      </div>
                      <?php
                      foreach ($carrito as $item) {
                          ?>
                          <div class="grid_8" id="productos_carrito">
                              <div class="grid_2"><?= ucfirst($item['name']) ?></div>

                              <?php
                              $nombres = array('nombre' => ucfirst($item['name']));
                              $precio = $item['price'];
                              ?>

                              <div class="grid_2"><?= number_format($item['price'] * $item['qty'], 0, '', '.') ?></div>
                              <div class="grid_2"><?= $item['qty'] ?></div>

                              <div class="grid_1"><?= anchor(base_url('tienda/eliminar_producto/' . $item['rowid']), 'Eliminar') ?></div>
                              <!--<div class="grid_1"><?= anchor(base_url('tienda/restar_producto/' . $item['rowid']), 'Restar') ?></div>-->
                          </div>
                          <?php
                      }

                      ?>
                      <div class="grid_8" id="total">
                          <div class="grid_8" id="total_price">
                              Total: <strong><h2><?=number_format($this->cart->total(), 0, '', ',');?> COP.</h2></strong>
                          </div>
                          <div class="grid_8" id="pagar"><h4><?= anchor(base_url('tienda/paypal'), 'Pagar con PAYPAL')?></h4></div>
                          <div class="grid_8" id="pagar"><h5><?= anchor(base_url('tienda/vaciar_carrito'), 'Desocupar Carrito')?></h5>
                          </div>
                      </div>
                  </div>
                  <?php
              }
              ?>

  </div>

</div>
<br><br><br><form method="post" action="<?php echo base_url(); ?>main/login">
    <button class="button"><span>Salir</span></button>
</form>
</body>

<style>

.jumbotron {   }

body {
    background-image: url("https://k60.kn3.net/taringa/0/6/5/D/8/3/VCLR/C5F.png");
    margin-bottom: 0px;
		height: 630px;
		color: WHITE;
		text-shadow: black 0.1em 0.7em 0.3em;
}

</style>

</html>
