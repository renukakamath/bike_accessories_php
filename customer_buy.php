
<?php include 'customerheader.php' ;

$cid=$_SESSION['cid'];





 $q1="SELECT * FROM `ordermaster` INNER JOIN `orderchild` USING(`omaster_id`)  INNER JOIN `product` USING(`product_id`)  INNER JOIN `brand` USING(`brand_id`) INNER JOIN `subcategory` USING(`subcategory_id`)  WHERE `customer_id`='$cid' AND `status`='Pending'";
$res1=select($q1);
$qq="SELECT *,COUNT(`ochild_id`) AS cart_count,SUM(`amount`) AS ttamount FROM `ordermaster` INNER JOIN `orderchild` USING(`omaster_id`)  WHERE `customer_id`='$cid' AND `status`='Pending'";
$rr=select($qq);

if(isset($_GET['remove_item'])){
    extract($_GET);
     $qu="UPDATE `ordermaster` SET `total`=`total`-'$amount' WHERE `omaster_id`='$order_mid'";
    update($qu);
     $qd="DELETE FROM `orderchild` WHERE `product_id`='$remove_item' AND `omaster_id`='$order_mid'";
    delete($qd);

     $g="select * from  ordermaster where omaster_id='$order_mid' and total='0'";
    $hg=select($g);
    if(sizeof($hg)>0)
    {
       $j="delete from ordermaster where omaster_id='$order_mid'";
        delete($j);
        
    }


    alert("Successfully Removed");
    redirect("customer_searchproduct.php");

}


$q="select * from ordermaster where status='pending'";
$res=select($q);
if (sizeof($res)>0) {
	

?>

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
	<h1 class="display-3 text-black mb-4 pb-3 animated slideInDown">View Cart</h1>
	<table>
		<tr>
			<th>Category</th>
			<th>Subcategory</th>
			<th>Brand</th>
			<th>Product</th>
			<th></th>
			<th>Quantity</th>
			<th>Amount</th>
			
		</tr>
		<?php 


            $q="SELECT *,concat(orderchild.quantity) as qty FROM orderchild INNER JOIN ordermaster USING (omaster_id) INNER JOIN product USING (product_id) INNER JOIN subcategory USING (subcategory_id) INNER JOIN brand USING (brand_id)INNER JOIN `category` USING (`category_id`) where customer_id='$cid' and status='pending'";
            $res=SELECT($q);
            foreach ($res as $row) {
            	?>
            	
            <tr>
            	<td><?php echo $row['category'] ?></td>
            	<td><?php echo $row['subcategory'] ?></td>
            	<td><?php echo $row['brand'] ?></td>
            	<td><?php echo $row['product'] ?></td>
            	<td><img src="<?php echo $row['image'] ?>" width="100" height="100"></td>
            	<td><?php echo $row['qty'] ?></td>
            	<td><?php echo $row['rate'] ?></td>
            	 <td><a class=" btn btn-danger" type="button" href="?remove_item=<?php echo $row['product_id']; ?>&order_mid=<?php echo $row['omaster_id']; ?>&amount=<?php echo $row['amount']; ?>"/>Remove</td>
            	
            </tr>
<?php  
}
}else{?>

<h1 align="center">Cart Is Empty</h1>


<?php }
		 ?>
		<tr>

			

              	<td align="center" colspan="9"><a class=" btn btn-success"  href="customer_makepayent.php?amt=<?php echo $row['rate'] ?>&omid=<?php echo $row['omaster_id'] ?>&qty=<?php echo $row['qty'] ?>">Buy Now</a>Total:<?php echo $row['total'] ?></td>
              	
        
			</table>
</center>
<?php include 'footer.php' ?>