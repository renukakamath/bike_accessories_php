
<?php include 'customerheader.php' ;

$cid=$_SESSION['cid'];
	

?>
 <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="text-primary text-uppercase"></h6>
                <h1 class="display-3 text-black mb-4 pb-3 animated slideInDown">MY Orders</h1>
            </div>
            <div class="row g-4">

		<?php 


            $q="SELECT *,concat(orderchild.quantity) as qty FROM orderchild INNER JOIN ordermaster USING (omaster_id) INNER JOIN product USING (product_id) INNER JOIN subcategory USING (subcategory_id) INNER JOIN brand USING (brand_id)INNER JOIN `category` USING (`category_id`) where customer_id='$cid' and status='paid'";
            $res=SELECT($q);
            foreach ($res as $row) {
            	?>
            	
                             <div class="col-lg-3 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid" href="<?php echo $row['image'] ?>" ><img  src="<?php echo $row['image'] ?>" height="250" alt="">
                            <div class="team-overlay position-absolute start-0 top-0 w-100 h-100">
                                <h5>Product:<?php echo $row['product']?></h5>
                               
                            </div>
                        </div>
                        <div class="bg-light text-center p-4">
                          <h5>Category:<?php echo $row['category'] ?></h5>
                          <h5>Subcategory:<?php echo $row['subcategory'] ?></h5>
                          
                                <h5>Brand:<?php echo $row['brand']?></h5>
                               
                                 <h5>rate:<?php echo $row['total']?></h5>
                                <h5>quantity:<?php echo $row['qty']?></h5>
         
         
                        </div>

                </div>
                    </div>
                 <?php } ?>    


<?php include 'footer.php' ?>