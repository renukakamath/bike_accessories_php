<?php include 'customerheader.php' ;
$cid=$_SESSION['cid'];
extract($_GET);



if (isset($_POST['cart'])) {
	extract($_POST);

	echo$data=$quantity;
	echo$stock=$stock;

	if ($stock < $quantity ) {

		alert('Enter Less Quantity');
	}
else{

	echo$q2="select * from ordermaster where customer_id='$cid' and status='pending'";
	$res=select($q2);
	if (sizeof($res)>0) {
		$omid=$res[0]['omaster_id'];
	}else{

	$q="insert into ordermaster values(null,'$cid','$total',curdate(),'pending')";
	$omid=insert($q);


	$q3="insert into orderchild values(null,'$omid','$pid','$total','$quantity')";
	insert($q3);


	alert('successfuly');
	return redirect('customer_buy.php');
}
  $q4="select * from orderchild where product_id='$pid' and omaster_id='$omid' ";
  $res2=select($q4);

  if (sizeof($res2)>0) {
  	$odid=$res2[0]['ochild_id'];

  	$q5="update orderchild set quantity=quantity+'$quantity', amount=amount+'$total' where ochild_id='$odid' ";
  	update($q5);
  	
  }else{

	$q3="insert into orderchild values(null,'$omid','$pid','$total','$quantity')";
	insert($q3);
	}

	$q6="update ordermaster set total=total+'$total' where omaster_id='$omid' ";
	update($q6);
	alert('successfuly');
	return redirect('customer_buy.php');

}
}


?>

<!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="img/carousel-bg-1.jpg" alt="Image">
                    <div class="carousel-caption d-flex align-items-center">
                        <div class="container">

 <script type="text/javascript">
	function TextOnTextChange()
	{
		var x =document.getElementById("p_amount").value;
		var y =document.getElementById("p_qnty").value;
		
		document.getElementById("t_amount").value = x * y;
	}

</script>
<center>
	<h1 class="display-3 text-white mb-4 pb-3 animated slideInDown">Add To Cart</h1>
<form method="post">
	<table class="table"  style="width: 500px;color: white">
		<tr>
			
		</tr>
		<tr>
			<th>Product</th>
			<th><img src="<?php echo $img ?>" width="100" height="100"><input type="text" required="" readonly="" class="form-control" value="<?php echo $product ?>" name=""></th>
		</tr>
		<tr>
			<th>Rate</th>
			<th><input type="number" required=""  readonly="" id="p_amount" class="form-control" value="<?php echo $rate ?>" name=""></th>
		</tr>
		<tr>
			<th>Quantity</th>
			<th><input type="number" required=""  id="p_qnty" onchange="TextOnTextChange()"   class="form-control" name="quantity"></th>
		</tr>
		<tr>
			<th>Total</th>
			<th><input type="number" required="" id="t_amount" class="form-control"name="total"></th>
		</tr>
		<tr>
			<td align="center" colspan="2"><input type="submit" class="btn btn-success" name="cart"></td>
		</tr>
	</table>
</form>
</center>
<div class="col-lg-5 d-none d-lg-flex animated zoomIn">
                                    <img class="img-fluid" src="img/carousel-1.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
<?php include 'footer.php' ?>