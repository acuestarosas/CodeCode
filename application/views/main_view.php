<!DOCTYPE html>
<html>
  <head>
    <title>REGISTRO</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
  </head>

<body>
  <center>   <img src="https://thumbs.gfycat.com/UnknownMedicalBlackrussianterrier-small.gif" width="8%">
    <h1><strong><p class="text-primary">REGISTRO</p></h1></strong>
    </div>
  </center>

  <div class="container">
    <div class="jumbotron">
      <p class="bg-primary text-white">Diligencie todos los campos</p>

	     <form method="post" action="<?php echo base_url()?>main/form_validation">

        <?php
    		if($this->uri->segment(2) == "inserted"){
          echo '<p class="bg-success">EXCELENTE, usted ya esta en nuestra Base de Datos, puede seguir comprando</p> ';
    		}

        if($this->uri->segment(2) == "updated"){
    		}
    		?>

    		<?php
    		if(isset($user_data))	{
    			foreach($user_data->result() as $row){
    		?>

    		<?php
    			}
    		}
    		else
        {
    		?>
    		<div class="form-group">
          <center>
      			<label><input type="text"  placeholder="   &#128526;   Nick Name   &#128526;" name="first_name" class="form-control" /></label>
            <label><input type="password" placeholder=" &#128272;    Contraseña    &#128272;" name="last_name" class="form-control" /></label> <br><br>
            <label><input type="text"  placeholder="&#128585;&#128585;  Nombres  &#128585;&#128585;" name="nombre" class="form-control" /></label>
            <label><input type="text"  placeholder=" &#128222; &#128241;   Telefono   &#128241;&#128222;" name="telefono" class="form-control" /></label>
            <label><input type="text"  placeholder="&#128231;Correo Electronico&#128231;" name="email" class="form-control" /></label>
          </center>
		     </div>

         <center>
             <div class="form-group">
               <button class="button"  type="submit" name="insert" value="Registrese"><span>Registrarse</span></button>
             </div>
          <?php
        	}
        	?>

          </form>

          <form method="post" action="<?php echo base_url(); ?>tienda/indexx">
            <div class="form-group">
              <button class="button"><span>Seguir Comprando</span></button>
            </div>
          </form>

      <!--<a href="#" class="fa fa-facebook"></a>-->

      <form method="post" action="<?php echo base_url(); ?>main/login">
        <div class="form-group">
        <br><br><br><br><br><br><br><br>  <button class="button"><span>EREES EL ADMINISTRADOR</span></button>
        </div>
      </form>

    </center>
  </body>



  <script>
    function hand() {
    }
  </script>

  <style>

    .jumbotron {
      /*background-image:url("https://image.shutterstock.com/z/stock-vector-panda-portrait-in-a-glasses-with-bow-tie-vector-555620740.jpg")      */
      background-image: url("https://k60.kn3.net/taringa/0/6/5/D/8/3/VCLR/C5F.png");
     }

    .fa {
      padding: 20px;
      font-size: 30px;
      width: 30px;
      text-align: center;
      text-decoration: none;
      margin: 5px 2px;
      border-radius: 50%;
    }

    .fa-facebook {
      background: #3B5998;
      color: white;
    }

    .fa-youtube {
      background: #bb0000;
      color: white;
    }

    .button {
    border-radius: 4px;
    background-color: #3399ff;
    border: none;
    color: #FFFFFF;
    text-align: center;
    font-size: 18px;
    padding: 5px;
    width: 210px;
    transition: all 0.8s;
    cursor: pointer;
    margin: 3px;
  }

  .button span {
    cursor: pointer;
    display: inline-block;
    position: relative;
    transition: 0.5s;
  }

  .button span:after {
    content: '\00bb';
    position: absolute;
    opacity: 0;
    top: 0;
    right: -20px;
    transition: 0.5s;
  }

  .button:hover span {
    padding-right: 25px;
  }

  .button:hover span:after {
    opacity: 1;
    right: 0;
  }

  </style>


</html>
