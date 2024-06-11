<?php include 'staffheader.php' ?>



 <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5" >
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="img/carousel-bg-1.jpg" alt="Image" style="height: 200px">
                    <div class="carousel-caption d-flex align-items-center">
                        <div class="container">
                            </div></div></div></div></div></div>
<center>
	<h2 class="display-3 text-black mb-4 pb-3 animated slideInDown"> View Purchase</h2>
	<table style="width: 500px">
		<tr>
			<th>Slno</th>
			
                  <th>Product</th>
                  <th>Amount</th>
                  <th>Quantity</th>

		</tr>
		<?php 

             $q="SELECT * FROM purchasemaster INNER JOIN purchasechild USING (pmaster_id) INNER JOIN vendor_product USING (vproduct_id) INNER JOIN product USING (product_id)WHERE STATUS='paid'";
             $res=select($q);
             $slno=1;
             foreach ($res as $key) {
             	?>
             <tr>
                  <td><?php echo $slno++ ?></td>
             	
             	<td><?php echo $key['product'] ?></td>
             	<td><?php echo $key['amount'] ?></td>
                  <td><?php echo $key['quantity'] ?></td>
             </tr>
            <?php 
             }



		 ?>
	</table>
</center>
<?php include 'footer.php' ?>