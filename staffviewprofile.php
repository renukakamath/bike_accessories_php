<?php include 'staffheader.php';
   $sid=$_SESSION['sid'];



   if(isset($_POST['btn'])){
    extract($_POST);

    $q="update staff set firstname='$f', lastname='$l', place='$pl', phone='$p', email='$e' where staff_id='$profid'  ";
    update($q);
    $q="update login set username='$u' where login_id='$logid'";
    update($q);
    return redirect("staffviewprofile.php");
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

<center>
<?php 
if(isset($_GET['profid'])){
?>



<h3 class="display-3 text-white mb-4 pb-3 animated slideInDown">Update Profile</h3>
<?php 
            $q="select * from staff inner join login using (login_id) where staff_id='$sid'";
            $res=select($q);

            $i=1;
            foreach($res as $row){
            ?>
            <form action="" method="post">
<table>
    <tr>
        <th align="right">First Name :</th>
        <td><input type="text" value="<?php echo $row['firstname']?> " name="f" id=""></td>
        </tr>
        <tr>

            <th align="right">Last Name :</th>
            <td><input type="text" value="<?php echo $row['lastname']?> " name="l" id=""></td>
</tr>
        <tr>

            <th align="right">Place :</th>
            <td><input type="text" value="<?php echo $row['place']?> " name="pl" id=""></td>
</tr>
        <tr>

            <th align="right">Phone :</th>
            <td><input type="text" value="<?php echo $row['phone']?> " name="p" id=""></td>
</tr>
        <tr>

            <th align="right">Email :</th>
            <td><input type="text" value="<?php echo $row['email']?> " name="e" id=""></td>
</tr>
        <tr>

            <th align="right">Username :</th>
            <td><input type="text" value="<?php echo $row['username']?> " name="u" id=""></td>
</tr>
    
    </tr>
   
    <tr>
               
               
            
               
              
               
    </tr>
    <tr>
        <td><input type="submit" class="btn btn-success" value="update" name="btn" id=""></td>
    </tr>
</table>
</form>
<?php }?>


<?php }else{?>

<h3 class="display-3 text-white mb-4 pb-3 animated slideInDown">My Profile</h3>
<?php 
            $q="select * from staff inner join login using (login_id) where staff_id='$sid'";
            $res=select($q);

            $i=1;
            foreach($res as $row){
            ?>
<table>
    <tr>
        <th align="right">First Name :</th>
        <td><?php echo $row['firstname']?> </td>
        </tr>
        <tr>

            <th align="right">Last Name :</th>
            <td><?php echo $row['lastname']?></td>
</tr>
        <tr>

            <th align="right">Place :</th>
            <td><?php echo $row['place']?></td>
</tr>
        <tr>

            <th align="right">Phone :</th>
            <td><?php echo $row['phone']?></td>
</tr>
        <tr>

            <th align="right">Email :</th>
            <td><?php echo $row['email']?></td>
</tr>
        <tr>

            <th align="right">Username :</th>
            <td><?php echo $row['username']?></td>
</tr>
    
    </tr>
   
    <tr>
               
               
              <td><a class="btn btn-success" href="?profid=<?php echo $row['staff_id']?>&logid=<?php echo $row['login_id']?>">Update profile</a></td>
               
              
               
    </tr>
</table>
<?php }?>
<?php }?>

</center>

   <div class="col-lg-5 d-none d-lg-flex animated zoomIn">
                                    <img class="img-fluid" src="img/carousel-1.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
<?php include 'footer.php'?>