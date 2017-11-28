<!DOCTYPE html>
<html>
  <head>
	    <title>SUBIR_IMAGEN</title>
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
				<div style="text-align:center"> <a style="text-decoration:none;"><iframe src="https://www.zeitverschiebung.net/clock-widget-iframe-v2?language=es&size=small&timezone=America%2FBogota" width="80%" height="90" frameborder="0"></iframe>
				<form method="post" action="<?php echo base_url(); ?>main/login">
					<button class="button"><span>Salir de Administrador</span></button>
				</form>

				<form method="post" action="<?php echo base_url(); ?>main/enter">
					<button class="button"><span>Volver al Administrador</span></button>
				</form>

				<form method="post" action="<?php echo base_url(); ?>carrito/index">
						<button class="button"><span>Ver Carrito &#128722;  &#128722;</span></button>
				</form>
				<hr align="left" noshade="noshade" size="10" width="80%" />

				<center>
				<h1><strong><p class="text-primary">SUBIR NUEVA IMAGEN &#11014; &#128194;</p></h1></strong>

				<form method="post" id="upload_form" align="center" enctype="multipart/form-data">
					<input type="file" name="image_file" id="image_file" /><br><br>

					<button type="submit" name="upload" id="upload" class="btn btn-info" ><span><h6>&#11014; Subir imagen &#11014;</h6></span></button>
					<hr><hr>
				</form>

				<div id="uploaded_image"></div>

				</div>
			</div>
			</center>
	</body>
</html>


<script>
$(document).ready(function(){
	$('#upload_form').on('submit', function(e){
		e.preventDefault();
		if($('#image_file').val() == '')
		{
			alert("Please Select the File");
		}
		else
		{
			$.ajax({
				url:"<?php echo base_url(); ?>main/ajax_upload",
				method:"POST",
				data:new FormData(this),
				contentType: false,
				cache: false,
				processData:false,
				success:function(data)
				{
					$('#uploaded_image').html(data);
				}
			});
		}
	});
});
</script>


<style>
	.jumbotron {
		background-image: url("https://img1.goodfon.com/original/2560x1600/9/6f/minimalizm-gradient-background.jpg" );
		margin-bottom: 10px;
		height: 1000px;
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
