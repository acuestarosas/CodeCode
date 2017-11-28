<html>
<head>
  <title> &#128722;  &#128722;  &#128722; </title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
</head>

<body>
  <hr><center><h1  class="display-1"><strong> &#128722; CARRITO DE COMPRAS &#128722; </strong> </h1> </center> <hr>
   <center><strong><h1 display-1 ></h1>

   <p><div class="container"> </p>
    <div class="col-lg-6 col-md-6">
     <div class="table-responsive">
      <h1 align="center" class="bg-primary text-white" > &#128240; CATALOGO DE PRODUCTOS &#128214; &#128366;  &#128717;</h1><br/>
      <?php
      foreach($product as $row)
      {
       echo '
       <div class="col-md-6" style="padding:16px; background-color:#cc99ff; border:1px solid #ff0066; margin-bottom:25px; height:370px" align="center">
        <img src="'.base_url().'pictures/'.$row->product_image.'" class="img-thumbnail" />
           <hr> <h3>'.$row->product_name.'</h3>
           <h2 class="text-danger">$ '.$row->product_price.' COP</h2>

        <input type="text" align="center"  placeholder="CANTIDAD" name="quantity" class="form-control quantity" id="'.$row->product_id.'" /><br/>

        <button type="button" name="add_cart" class="btn btn-primary add_cart" data-productname="'.$row->product_name.'
                               " data-price="'.$row->product_price.'
                               " data-productid="'.$row->product_id.'" /> <h4> &#128722; AGREGAR AL CARRITO &#128722; </h4>
       </button>
       </div>
       ';
      }
      ?>

  </div>
 </div>
 <div class="col-lg-6 col-md-6">
  <div id="cart_details">
   <h3 align="center">Cart is Empty</h3>
  </div>
 </div>

</div>
</body>
</html>
<script>
$(document).ready(function(){

 $('.add_cart').click(function(){
  var product_id = $(this).data("productid");
  var product_name = $(this).data("productname");
  var product_price = $(this).data("price");
  var quantity = $('#' + product_id).val();
  if(quantity != '' && quantity > 0)
  {
   $.ajax({
    url:"<?php echo base_url(); ?>carrito/add",
    method:"POST",
    data:{product_id:product_id, product_name:product_name, product_price:product_price, quantity:quantity},
    success:function(data)
    {
     alert("Product Added into Cart");
     $('#cart_details').html(data);
     $('#' + product_id).val('');
    }
   });
  }
  else
  {
   alert("Please Enter quantity");
  }
 });

 $('#cart_details').load("<?php echo base_url(); ?>carrito/load");

 $(document).on('click', '.remove_inventory', function(){
  var row_id = $(this).attr("id");
  if(confirm("Are you sure you want to remove this?"))
  {
   $.ajax({
    url:"<?php echo base_url(); ?>carrito/remove",
    method:"POST",
    data:{row_id:row_id},
    success:function(data)
    {
     alert("Product removed from Cart");
     $('#cart_details').html(data);
    }
   });
  }
  else
  {
   return false;
  }
 });

 $(document).on('click', '#clear_cart', function(){
  if(confirm("Are you sure you want to clear cart?"))
  {
   $.ajax({
    url:"<?php echo base_url(); ?>carrito/clear",
    success:function(data)
    {
     alert("Your cart has been clear...");
     $('#cart_details').html(data);
    }
   });
  }
  else
  {
   return false;
  }
 });

});
</script>
