<?php include 'staffheader.php';
 
  

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
<h3 class="display-3 text-black mb-4 pb-3 animated slideInDown" align="center">View Products</h3>
<table style="width: 1200px; " class="table">
    <tr align="center">
        <th></th>
        <th>Product</th>
        <th>Brand</th>
        <th>sub category</th>
        <th>rate</th>
        <th>quantity</th>
    </tr>
    <?php 
    $q="select * from product inner join vendor_product using (product_id) inner join brand using (brand_id) inner join subcategory using (subcategory_id) ";
    $ven=select($q);

    $i=1;
    foreach($ven as $row){
    ?>
    <tr align="center">
        <td><a href="<?php echo $row['image'] ?>"><img width="100" height="100" src="<?php echo $row['image'] ?>" alt="image"></a></td>
        <td><?php echo $row['product']?></td>
        <td><?php echo $row['brand']?></td>
        <td><?php echo $row['subcategory']?></td>
        <td><?php echo $row['rate']?></td>
        <td><?php echo $row['quantity']?></td>
        <td><a class="btn btn-success" href="staffpurchase.php?vpid=<?php echo $row['vproduct_id'] ?>&product=<?php echo $row['product'] ?>&img=<?php echo $row['image'] ?>&rate=<?php echo $row['rate'] ?>&pid=<?php echo $row['product_id'] ?>">Purchase</a></td>

    </tr>
    <?php }?>
</table>

  </center>
    
<?php include 'footer.php'?>