<?php include 'adminheader.php'?>


 <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5" >
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="img/carousel-bg-1.jpg" alt="Image" style="height: 200px">
                    <div class="carousel-caption d-flex align-items-center">
                        <div class="container">
                            </div></div></div></div></div></div>
    <h2 class="display-3 text-black mb-4 pb-3 animated slideInDown" align="center">View Products</h2>
    <table style="width: 1200px;">
        <tr align="center">
            <th></th>
            <th>Product</th>
            <th>Brand</th>
            <th>Category</th>
            <th>Sub Category</th>
            <th>Rate</th>
            <th>Quantity</th>
        </tr>

            <?php 
            $q="select * from product inner join `subcategory` using (subcategory_id) inner join `category` using (category_id) inner join brand using (brand_id)";
            $res=select($q);

            $i=1;
            foreach($res as $row){
            ?>
         <tr align="center">
         <td><a href="<?php echo $row['image'] ?>"><img width="100" height="100" src="<?php echo $row['image'] ?>" alt="image"></a></td>
      
            <td><?php echo $row['product']?></td>
            <td><?php echo $row['brand']?></td>
            <td><?php echo $row['category']?></td>
            <td><?php echo $row['subcategory']?></td>
            <td><?php echo $row['rate']?></td>
            <td><?php echo $row['quantity']?></td>

        </tr>
        <?php }?>
    </table>
<?php include 'footer.php'?>