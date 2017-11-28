<!DOCTYPE html>
<html>
  <head>
    <title>ADMINISTRADOR</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
  </head>

<body>
<div class="jumbotron">
  <div class="container">

    <form method="post" action="<?php echo base_url(); ?>main/login">
        <button class="button"><span>Salir de Administrador</span></button>
    </form>

    <form method="post" action="<?php echo base_url(); ?>main/image_upload">
        <button class="button"><span>Agregar Imagen</span></button>
    </form>

    <form method="post" action="<?php echo base_url(); ?>tienda/index">
        <button class="button"><span>Ver Cátalogo y Carrito &#128717;  &#128717;  &#128722;</span></button>
    </form>


    <center>

      <h4><p class="bg-primary">Usuarios Registrados</p></h4>
        <table class="table table-dark table-hover">
        <thead>
          <tr>
            <th>ID</th>
            <th>NICK NAME DEL CLIENTE</th>
            <th>CONTRASEÑA</th>
            <th>TELEFONO</th>
            <th>EMAIL</th>
            <th>ELIMINAR</th>
          </tr>
        </thead>
        <?php
        if($fetch_data->num_rows() > 0) {
          foreach($fetch_data->result() as $row) {
        ?>
          <tr>
        <tbody>
          <tr>
    				<td><?php echo $row->id; ?></td>
    				<td><?php echo $row->first_name; ?></td>
    				<td><?php echo $row->last_name; ?></td>
            <td><?php echo $row->telefono; ?></td>
            <td><?php echo $row->email; ?></td>
            <td><a href="#" class="delete_data" id="<?php echo $row->id; ?>">SUPRIMIR DE BDD</a></td>
    			</tr>
        </tbody>
        <?php
    			}
    		}
    		else
    		{
    		?>

    		<?php
    		}
    		?>

      </table>
    </center>
      </div>
  </div>

  <script>
	$(document).ready(function(){
		$('.delete_data').click(function(){
			var id = $(this).attr("id");
			if(confirm("Realmente quiere eliminar este usuario? ... que le ") ){
				window.location="<?php echo base_url(); ?>main/delete_data/"+id;
			}
			else
			{
				return false;
			}
		});
	});
  	</script>

    <style>
      .jumbotron {
        background-image: url("https://img1.goodfon.com/original/2560x1600/9/6f/minimalizm-gradient-background.jpg");
        margin-bottom: 0px;
        border-radius: 10px;
        height: 550px;
        color: white;
        text-shadow: black 0.3em 0.3em 0.3em;
      }

      .button {
    	border-radius: 4px;
    	background-color: #3399ff;
    	border: none;
    	color: #FFFFFF;
    	text-align: center;
    	font-size: 18px;
    	padding: 5px;
    	width: 280px;
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

  </body>
</html>
