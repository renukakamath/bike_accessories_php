<?php include 'adminheader.php';


if(isset($_POST['sub'])){
	extract($_POST);
	$q="INSERT INTO `brand` VALUES(null,'$catg')";
	$ids=insert($q);

    return redirect("adminmanagebrand.php");
}


if(isset($_POST['update'])){
	extract($_POST);
     $q="update brand set brand='$catg' where brand_id='$uid'";
    update($q);
   return redirect("adminmanagebrand.php");
}

if(isset($_GET['did'])){
    $q="delete from brand where brand_id='$did' ";
    delete($q);
    return redirect("adminmanagebrand.php");
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
                            <div class="row align-items-center justify-content-center justify-content-lg-start">
                                <div class="col-10 col-lg-7 text-center text-lg-start">
<!--                                     <h1 class="display-3 text-white mb-4 pb-3 animated slideInDown">A faster bike needs a sharper helmet</h1>
 -->                                    
                                </div>
                               




<?php 
if(isset($_GET['uid'])){
   

?>

<!-- <style>
input[type='text']{
  color: red;
  
}
label{
  color: black;
  font-weight: 500;
  font-size:medium;
  font-family: serif;
  
}
tr{
  border-bottom: 1px solid transparent;
}
input[type='submit']{
  width: 120px !important;
}
input[type='text'],input[type='password'],input[type='submit']{
  border-radius: 1px !important;
}
#loghead{
  font-weight: 800;
  font-size: 50px !important;
  font-family: "Montserrat", sans-serif;
  font-family: "Open Sans", sans-serif;
  text-shadow: black -1px 0,
                #D5D5D1 2px 0;
}

          </style>
 -->


                           
<center>
<form  method="post">

<h1 class="display-3 text-white mb-4 pb-3 animated slideInDown"> Update Brand</h1>
<?php 
    $q="select * from brand where brand_id='$uid'";
    $res=select($q);

    $i=1;
    foreach($res as $row){
    ?>
<table class="table "  style="width: 500px;color:white">
<tr>
    <th>Brand Name </th>
    <td><input type="text" value="<?php echo $row['brand'] ?>" required class="form-control" name="catg" id=""></td>
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
<h1 class="display-3 text-white mb-4 pb-3 animated slideInDown"> Manage Brand</h1>

<table class="table " style="width: 500px;color: white" >
<tr>
    <th>Brand Name </th>
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

 <div class="col-lg-5 d-none d-lg-flex animated zoomIn">
                                    <img class="img-fluid" src="img/carousel-1.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
     
   
        </div>
    </div>
    <!-- Carousel End -->



<center>

<h3>View Brands</h3>
<table style="width: 400px;">
    <tr>
        <th>Index</th>
        <th>Brand Name</th>
      
    </tr>
    <?php 
    $q="select * from brand";
    $res=select($q);

    $i=1;
    foreach($res as $row){
    ?>
    <tr>

        <td><?php echo $i?></td>
        <td><?php echo $row['brand'] ?></td>

        <td><a class="btn btn-success" href="?uid=<?php echo $row['brand_id'] ?>">update</a></td>
        <td><a class="btn btn-danger"  href="?did=<?php echo $row['brand_id'] ?>">delete</a></td>
    </tr>
    <?php 
$i++;
}?>
</table>
</center>
</center>
<?php include 'footer.php'?>

