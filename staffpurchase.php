<?php include 'staffheader.php' ;

 $sid=$_SESSION['sid'];
 extract($_GET);




if (isset($_POST['sub'])) {
	extract($_POST);

	$q="insert into purchasemaster values(null,'$sid','$total',curdate(),'pending')";
	$id=insert($q);

	$q2="insert into purchasechild values(null,'$id','$vpid','$rate','$qua')";
	insert($q2);

	$q3="update product set quantity=quantity+'$qua' where product_id='$pid'";
	update($q3);
	alert('successfully');
	return redirect("staffpurchase.php?product=$product&img=$img&rate=$rate");
}



?>
<?php 
extract($_GET);

if (isset($_GET['pmid'])) {
	extract($_GET);

	$q4="update purchasemaster set status='paid' where pmaster_id='$pmid'";
	update($q4);
	alert('successfully');
	// return redirect("staffpurchase.php?product=$product&img=$img&rate=$rate");
	
	

}


 ?>

 <script type="text/javascript">
	function TextOnTextChange()
	{
		var x =document.getElementById("p_amount").value;
		var y =document.getElementById("p_qnty").value;
		
		document.getElementById("t_amount").value = x * y;
	}

</script>


 <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="img/carousel-bg-1.jpg" alt="Image">
                    <div class="carousel-caption d-flex align-items-center">
                        <div class="container">
<center>
	<h2  class="display-3 text-white mb-4 pb-3 animated slideInDown" id="hstyle">Purchase</h2>
	<form method="post">
<table class="table " style="width: 500px;color: white">

	<tr>
		
	</tr>
<tr>
	<th>Product</th>
	<td><img src="<?php echo $img ?>" readonly="" width="250" height="200"><input type="text" required class="form-control" value="<?php echo $product ?>" readonly="" name="product"></td>
</tr>

<tr>
    <th>Rate</th>
    <td><input type="text" required class="form-control" id="p_amount" value="<?php echo $rate ?>" readonly="" name="subcatg" id=""></td>
</tr>
<tr>
	<th>Quantity</th>
	<td><input type="number" required="" class="form-control"  id="p_qnty" onchange="TextOnTextChange()" name="qua"></td>
</tr>
<tr>
	<th>Total</th>
	<td><input type="number" required="" class="form-control" id="t_amount" name="total"></td>
</tr>
<tr>
    <td colspan="2" align="center">
        <input type="submit" class="btn btn-success" value="submit" name="sub" id="">
    </td>
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
<center>
	<h2 class="display-3 text-black mb-4 pb-3 animated slideInDown" > View Purchase</h2>
	<table class="table" style="width: 500px">
		<tr>
			
			<th>Total</th>
			<th>Date</th>

		</tr>
		<?php 

             $q="select * from purchasemaster inner join purchasechild using (pmaster_id) inner join vendor_product using (vproduct_id) inner join product using (product_id) where status='pending' and staff_id='$sid'";
             $res=select($q);
             foreach ($res as $key) {
             	?>
             <tr>
             	<td><?php echo $key['total'] ?></td>
             	<td><?php echo $key['date'] ?></td>
             	<td><a class="btn btn-danger" href="?pmid=<?php echo $key['pmaster_id'] ?>&img=<?php echo $key['image'] ?>&rate=<?php echo $key['rate'] ?>&product=<?php echo $key['product'] ?>">Conform</a></td>
             </tr>
            <?php 
             }



		 ?>
	</table>
</center>
<?php include 'footer.php' ?>