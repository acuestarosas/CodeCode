<!DOCTYPE html>
<html>
	<head>
		<title>LOGIN</title>
		<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
  </head>

<body>
	<div class="jumbotron">
	<center>   <img src="https://thumbs.gfycat.com/UnknownMedicalBlackrussianterrier-small.gif" width="8%">
		<h1><strong><p class="text-primary" >LOGIN</p></h1></strong>
	</center>

			<form method="post" action="<?php echo base_url(); ?>main/login_validation">

				<div class="form-group">
					<h5><strong>Digite el Nick Name</strong></h5>
					<p><input type="text" size="15" placeholder="&#128526; &#128526; Username  &#128526; &#128526;" name="username" class="form-control" /></p>
					<h6><span class="bg-primary text-white"><?php echo form_error('username'); ?></span></h6>

					<h5><strong>Digite la Contraseña</strong></h5>
					<input type="password" placeholder="&#128273; &#128272;&#128272;&#128272;&#128272; &#128273;" name="password" class="form-control" />
					<h6><span class="bg-primary text-white"><?php echo form_error('password'); ?></span></h6>
				</div>

				<div class="form-group">
					<?php
						echo '<h4><strong><label class="font-italic" class="text-black">'.$this->session->flashdata("error").'</label></strong></h4>';
					?>
				<center>
					<button class="button"  type="submit" name="insert" value="Login"><span>Login</span></button>
				</div>

			</center>
			</form>
			<center>
			<form method="post" action="<?php echo base_url(); ?>main/index">
				<div class="form-group">
					<button class="button"  type="submit" name="insert" value="Registrese"><span>Registrarse</span></button>
				</div>
			</form>

		</center>

		</div>

	</div>
</body>

<script>
	function hand() {
	}
</script>


<style>
	.jumbotron {
		background-image: url("https://k60.kn3.net/taringa/0/6/5/D/8/3/VCLR/C5F.png");
		margin-bottom: 0px;
		height: 630px;
		color: black;
		text-shadow: black 0.1em 0.7em 0.3em;
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
