<?php include 'adminheader.php';



if(isset($_POST['sub'])){
    $dir = "uploads/";
	$file = basename($_FILES['img']['name']);
	$file_type = strtolower(pathinfo($file, PATHINFO_EXTENSION));
	$target = $dir.uniqid("images_").".".$file_type;
	if(move_uploaded_file($_FILES['img']['tmp_name'], $target))
	{
        extract($_POST);
        $q="insert into product values(null,'$subctg', '$brand', '$product', '$target', '$rate', '$quantity')";
        $prid=insert($q);
        $q="insert into vendor_product values (null, '$prid', '$vid')";
        insert($q);
        return redirect("adminvendoraddproduct.php?vid=$vid");
    }
    else
    {
        echo "file uploading error occured";
    }
    



}


if(isset($_POST['update'])){
    $dir = "uploads/";
	$file = basename($_FILES['img']['name']);
	$file_type = strtolower(pathinfo($file, PATHINFO_EXTENSION));
	$target = $dir.uniqid("images_").".".$file_type;
	if(move_uploaded_file($_FILES['img']['tmp_name'], $target))
	{
        extract($_POST);
        $q="update  product set subcategory_id='$subctg', brand_id='$brand', product='$product', image='$target', rate='$rate', quantity='$quantity' where product_id='$uid'";
        update($q);
      
        return redirect("adminvendoraddproduct.php?vid=$vid");
    }
    else
    {
        echo "file uploading error occured";
    }
    



}




if(isset($_GET['did'])){
    $q="delete from product where product_id='$did' ";
    delete($q);
    return redirect("adminvendoraddproduct.php?vid=$vid");
}


?>
<center>

     <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="img/carousel-bg-1.jpg" alt="Image">
                    <div class="carousel-caption d-flex align-items-center">
                        <div class="container">

<?php 
if(isset($_GET['uid'])){
//    extract($_GET);

?>
<center>

<h1 class="display-3 text-white mb-4 pb-3 animated slideInDown">Update Products</h1>


<form  method="post" enctype="multipart/form-data">
<?php 
    $q1="select * from product inner join vendor_product using (product_id) inner join brand using (brand_id) inner join subcategory using (subcategory_id) where vendor_id='$vid' and product_id='$uid'";
    $ven=select($q1);

    $i=1;
    foreach($ven as $r){
    ?>
<table class="table" style="width: 500px;color: white">
<tr>
    <th>Sub Category </th>
    <td><select name="subctg" id="" class="form-control">
    <option value="<?php echo $r['subcategory_id'] ?>"><?php echo $r['subcategory'] ?></option>
 
    <?php 
    $q="select * from subcategory";
    $res=select($q);

    $i=1;
    foreach($res as $row){
    ?>
        <option value="<?php echo $row['subcategory_id']?>"><?php echo $row['subcategory']?></option>
       <?php }?>
    </select></td>
</tr>
<tr>
    <th>Brand </th>
    <td><select name="brand" id="" class="form-control">
    <option value="<?php echo $r['brand_id'] ?>"><?php echo $r['brand'] ?></option>
 
     <?php 
    $q="select * from brand ";
    $res=select($q);

    $i=1;
    foreach($res as $row){
    ?>
        <option value="<?php echo $row['brand_id']?>"><?php echo $row['brand']?></option>
       <?php }?>
    </select></td>
</tr>
<tr>
    <th>Product </th>
    <td><input type="text" value="<?php echo $r['product'] ?>" class="form-control" required class="form-control" name="product" id=""></td>
</tr>
<tr>
    <th>Image </th>
    <td><img src="<?php echo $r['image'] ?>" width="50" class="form-control" height="50" alt=""></td>
</tr>
<tr>
    <th></th>
    <td><input type="file" name="img" id=""></td>
</tr>
<tr>
    <th>Rate</th>
    <td><input type="number" value="<?php echo $r['rate'] ?>" required class="form-control" name="rate" id=""></td>
</tr>
<tr>
    <th>Quantity</th>
    <td><input type="number" value="<?php echo $r['quantity'] ?>" required class="form-control" name="quantity" id=""></td>
</tr>

 
<tr>
    <td colspan="2" align="center">
        <input type="submit" class="btn btn-success" value="submit" name="update" id="">
    </td>
</tr>
</table>
<?php }?>
</form>

</center>

<?php }else{?>
    <center>
<h1 class="display-3 text-white mb-4 pb-3 animated slideInDown">Add Products</h1>


<form  method="post" enctype="multipart/form-data">

<table class="table" style="width: 500px;color: white" >
<tr>
    <th>Sub Category </th>
    <td><select name="subctg" id="" class="form-control">
    <?php 
    $q="select * from subcategory ";
    $res=select($q);

    $i=1;
    foreach($res as $row){
    ?>
        <option value="<?php echo $row['subcategory_id']?>"><?php echo $row['subcategory']?></option>
       <?php }?>
    </select></td>
</tr>
<tr>
    <th>Brand </th>
    <td><select name="brand" id="" class="form-control">
    <?php 
    $q="select * from brand ";
    $res=select($q);

    $i=1;
    foreach($res as $row){
    ?>
        <option value="<?php echo $row['brand_id']?>"><?php echo $row['brand']?></option>
       <?php }?>
    </select></td>
</tr>
<tr>
    <th>Product </th>
    <td><input type="text" required class="form-control" name="product" id=""></td>
</tr>
<tr>
    <th>Image </th>
    <td><input type="file" required class="form-control" name="img" id=""></td>
</tr>
<tr>
    <th>Rate</th>
    <td><input type="number" required class="form-control" name="rate" id=""></td>
</tr>
<tr>
    <th>Quantity</th>
    <td><input type="number" required class="form-control" name="quantity" id=""></td>
</tr>

 
<tr>
    <td colspan="2" align="center">
        <input type="submit" class="btn btn-success" value="submit" name="sub" id="">
    </td>
</tr>
</table>
</form>
<?php }?>


    <div class="col-lg-5 d-none d-lg-flex animated zoomIn">
                                    <img class="img-fluid" src="img/carousel-1.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

<br>


<h3>View Products</h3>
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
    $q="select * from product inner join vendor_product using (product_id) inner join brand using (brand_id) inner join subcategory using (subcategory_id) where vendor_id='$vid'";
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
        <td><a class="btn btn-success" href="?&uid=<?php echo $row['product_id']?>&sub=<?php echo $row['subcategory_id']?>&brand=<?php echo $row['brand_id']?>&vid=<?php echo $vid?>">update</a></td>
        <td><a class="btn btn-danger" href="?did=<?php echo $row['product_id']?>&vid=<?php echo $vid?>">delete</a></td>

    </tr>
    <?php }?>
</table>
</center>
<?php include 'footer.php' ?>
