<?php include 'customerheader.php';
 
  

?>


 <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5" >
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="img/carousel-bg-1.jpg" alt="Image" style="height: 200px">
                    <div class="carousel-caption d-flex align-items-center">
                        <div class="container">
                            <center>
<form method="post">
    <table align="center">
        <tr>
            <td><input type="text" class="form-control" required="" placeholder="search here" name="product"></td><td><input type="submit" name="sub" class="btn btn-success" value="search"></td>
        </tr>
    </table>
</form>
</center>
                            </div></div></div></div></div></div>





 <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="text-primary text-uppercase"></h6>
                <h1 class="display-3 text-black mb-4 pb-3 animated slideInDown">View Products</h1>
            </div>
            <div class="row g-4">
               

                                <?php 

    if (isset($_POST['sub'])) {
        extract($_POST);

  $q="select * from product inner join vendor_product using (product_id) inner join brand using (brand_id) inner join subcategory using (subcategory_id) INNER JOIN `category` USING (`category_id`) where category like '$product%' or subcategory like '$product%' or product like '$product%' or brand like '$product%'";

      
    }else{

    $q="select * from product inner join vendor_product using (product_id) inner join brand using (brand_id) inner join subcategory using (subcategory_id) INNER JOIN `category` USING (`category_id`) ";
}
    $res=select($q);

    $i=1;
    foreach($res as $row){

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
                          
                                <h5>Brand:<?php echo $row['brand']?></h5>
                                <h5>sub category:<?php echo $row['subcategory']?></h5>
                                 <h5>rate:<?php echo $row['rate']?></h5>
                                <h5>quantity:<?php echo $row['quantity']?></h5>
                                     <?php 

             if ($row['quantity']>0) {
                ?>
                <h5><a class="btn btn-success" href="customer_cart.php?img=<?php echo $row['image'] ?>&rate=<?php echo $row['rate']?>&pid=<?php echo $row['product_id'] ?>&product=<?php echo $row['product'] ?>&stock=<?php echo $row['quantity'] ?>">Add To Cart</a></h5>

            <?php 
             }elseif ($row['quantity']<=0) {
                ?>

             <h5><a class="btn btn-success" href="#">Out  Of  Stock</a></h5>
           <?php  
            }

             ?>

                        </div>

                </div>
                    </div>
                     


                           
    
    <?php }?>
             
           </div>
        </div>
    </div>

<?php include 'footer.php'?>



