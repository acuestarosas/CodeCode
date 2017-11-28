<!DOCTYPE html>
<head>
  <title> &#128722;  &#128722;  &#128722; </title>
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>css/estilos.css" media="screen"/>
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>css/960.css" media="screen"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
  </head>

<body>
  <center><h2  class="display-1"><strong>  &#128717; CATÁLOGO   &#128717; </strong> </h2> </center> <hr>
   <center><strong><h1 display-1 ></h1>

     <form method="post" action="<?php echo base_url(); ?>tienda/indexx">
         <button class="button"><span>Ver Carrito &#128722;  &#128722;</span></button>
     </form>

<div class="container_12">
<br><h2 align="center" class="bg-primary text-white" > CATÁLOGO DE PRODUCTOS &#128717;</h2>
    <div class="grid_20" id="articulos_muestra">

        <?php
        foreach ($productos as $producto) {
            ?>
            <?= form_open(base_url() . 'tienda/insert') ?>
            <div class="grid_4" id="prod_individual">
                <div class="grid alpha"><img src="<?=base_url('pictures/' . $producto->imagen)?> "></div>
                <div class="grid" id="nombre"><?=$producto->nombre?></div>

                <div class="grid">Cantidad:
                    <select name="qty">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>

                <div  class="grid" id="precio"><label>Precio: </label><?=$producto->precio?> <label> COP</label> </div>
                <?= form_hidden('id', $producto->id) ?>
                <?= form_submit ('action', 'Agregar al carrito') ?>

            </div>
            <?= form_close() ?>
            <?php } ?>
    </div>

</div>

</body>

<style>


<style>

.jumbotron {  }

body {
    background-image: url("https://k60.kn3.net/taringa/0/6/5/D/8/3/VCLR/C5F.png");
    margin-bottom: 0px;
		height: 630px;
		color: white;
		text-shadow: black 0.1em 0.7em 0.3em;
}

</style>

</html>
