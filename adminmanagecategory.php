<?php include 'adminheader.php';


if(isset($_POST['sub'])){
	extract($_POST);
	$q="INSERT INTO `category` VALUES(null,'$catg')";
	$ids=insert($q);

    return redirect("adminmanagecategory.php");
}


if(isset($_POST['update'])){
	extract($_POST);
     $q="update category set category='$catg' where category_id='$uid'";
    update($q);
   return redirect("adminmanagecategory.php");
}

if(isset($_GET['did'])){
    $q="delete from category where category_id='$did' ";
    delete($q);
    return redirect("adminmanagecategory.php");
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


<?php 
if(isset($_GET['uid'])){
   

?>



<center>
<form  method="post">

<h2 class="display-3 text-white mb-4 pb-3 animated slideInDown"> Update Category</h2>
<?php 
    $q="select * from category where category_id='$uid'";
    $res=select($q);

    $i=1;
    foreach($res as $row){
    ?>
<table class="table " style="width: 500px;color: white">
<tr>
    <th>Category Name </th>
    <td><input type="text" value="<?php echo $row['category'] ?>" required class="form-control" name="catg" id=""></td>
</tr>




 
<tr>
    <td colspan="2" align="center">
        <input type="submit" class="btn btn-success" value="Update" name="update" id="">
    </td>
</tr>
</table>
<?php }?>
</form>


<?php }else{?>

<center>
<form  method="post">

<h2 class="display-3 text-white mb-4 pb-3 animated slideInDown"> Manage Category</h2>
<table class="table "style="width: 500px;color: white" >
<tr>
    <th>Category Name </th>
    <td><input type="text" required class="form-control" name="catg" id=""></td>
</tr>

<tr>
    <td colspan="2" align="center">
        <input type="submit" class="btn btn-success" value="submit" name="sub" id="">
    </td>
</tr>
</table>
</form>
<?php }?>

<br>
       <div class="col-lg-5 d-none d-lg-flex animated zoomIn">
                                    <img class="img-fluid" src="img/carousel-1.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
 </center>
                <center>
<h3>View Category</h3>
<table style="width: 400px;">
    <tr>
        <th>Index</th>
        <th>Category Name</th>
      
    </tr>
    <?php 
    $q="select * from category";
    $res=select($q);

    $i=1;
    foreach($res as $row){
    ?>
    <tr>

        <td><?php echo $i?></td>
        <td><?php echo $row['category'] ?></td>

        <td><a class="btn btn-success" href="?uid=<?php echo $row['category_id'] ?>">update</a></td>
        <td><a class="btn btn-danger" href="?did=<?php echo $row['category_id'] ?>">delete</a></td>
    </tr>
    <?php 
$i++;
}?>
</table>
</center>
<?php include 'footer.php'?>

