<?php include 'customerheader.php';

$cid=$_SESSION['cid'];
extract($_GET);

if (isset($_POST['payment'])) {
	extract($_POST);

	echo $exp_date=$date;
	echo $cd=date("Y-m");

if ($exp_date < $cd) {


alert('expired'); 
			

}else{



$q="insert into payment values(null,'$omid','$amt',curdate())";
insert($q);
$q2="update ordermaster set status='paid' where omaster_id='$omid'";
update($q2);
alert('successfully');
return redirect('customer_myorders.php');
  


$q3="SELECT * FROM orderchild where omaster_id='$omid'";
$res=select($q3);



foreach ($res as $key) {

  $pid= $key['product_id'] ;

 $qty=$key['quantity'];

echo$q6="update product set quantity=quantity-'$qty' where product_id='$pid'";
update($q6);


}

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

<center>
	<h1 class="display-3 text-white mb-4 pb-3 animated slideInDown">make Payment</h1>
	<form method="post">
		<table class="table " style="width: 500px;color: white">
		<tr>
			<th>Amount</th>
			<td><input type="text" class="form-control" readonly="" value="<?php echo $amt ?>"  name="amo"></td>
		</tr>
		<tr>
			<th>Card Number</th>
			<td><input type="text" required="" class="form-control" maxlength="16" pattern="[0-9]{16}" title="Enter 16 digits" name="card"></td>
		</tr>
		<tr>
			<th>C V V</th>
			<td><input type="password" class="form-control" maxlength="3" pattern="[0-9]{3}" name="cvv"></td>

		</tr>
		<tr>
			<th>Expiry date</th>
			<td><input type="month" class="form-control" name="date"></td>
		</tr>
		<tr>
			<td align="center" colspan="2"><input type="submit" class="btn btn-success" name="payment"></td>
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
                </center>
                <center>
<?php include 'footer.php' ?>