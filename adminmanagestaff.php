<?php include 'adminheader.php';


if(isset($_POST['sub'])){
	extract($_POST);
	$q="INSERT INTO `login` VALUES(null,'$uname','$pss','staff')";
	$ids=insert($q);
	$qry="INSERT INTO `staff` VALUES(null,'$ids','$fname','$lname','$place','$phone','$email','$desig')";
	insert($qry);
    alert('registration successful');
    return redirect("adminhome.php");
}


if(isset($_POST['update'])){
	extract($_POST);
     $q="update staff set firstname='$fname', lastname='$lname', place='$place', phone='$phone', email='$email', designation='$desig' where staff_id='$uid'";
    update($q);
   return redirect("adminmanagestaff.php");
}

if(isset($_GET['did'])){
    $q="delete from staff where staff_id='$did' ";
    delete($q);
    return redirect("adminmanagestaff.php");
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

<h2 class="display-3 text-white mb-4 pb-3 animated slideInDown"> Update Staff</h2>
<?php 
    $q="select * from staff where staff_id='$uid'";
    $res=select($q);

    $i=1;
    foreach($res as $row){
    ?>
<table class="table " style="width: 500px;color: white">
<tr>
    <th>First Name </th>
    <td><input type="text" value="<?php echo $row['firstname'] ?>" required class="form-control" name="fname" id=""></td>
</tr>
<tr>
    <th>Last Name </th>
    <td><input type="text" value="<?php echo $row['lastname'] ?>" required class="form-control" name="lname" id=""></td>
</tr>
<tr>
    <th>Place </th>
    <td><input type="text" value="<?php echo $row['place'] ?>" required class="form-control" name="place" id=""></td>
</tr>
<tr>
    <th>Phone </th>
    <td><input type="number" required class="form-control" value="<?php echo $row['phone'] ?>" name="phone" id=""></td>
</tr>
<tr>
    <th>Email</th>
    <td><input type="email" required class="form-control" value="<?php echo $row['email'] ?>" name="email" id=""></td>
</tr>

 <tr>
    <th>Designation </th>
    <td><select name="desig"  id="" class="form-control">
        <option value="<?php echo $row['designation'] ?>"><?php echo $row['designation'] ?></option>
        <option value="Manager">Manager</option>
        <option value="Billing">Billing</option>
        <option value="Accountant">Accountant</option>
        <option value="Field Work">Field Work</option>
    </select></td>
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

<h2 class="display-3 text-white mb-4 pb-3 animated slideInDown"> Manage Staff</h2>
<table class="table " style="width: 500px;color: white">
<tr>
    <th>First Name </th>
    <td><input type="text" required class="form-control" name="fname" id=""></td>
</tr>
<tr>
    <th>Last Name </th>
    <td><input type="text" required class="form-control" name="lname" id=""></td>
</tr>
<tr>
    <th>Place </th>
    <td><input type="text" required class="form-control" name="place" id=""></td>
</tr>
<tr>
    <th>Phone </th>
    <td><input type="number" required class="form-control" name="phone" id=""></td>
</tr>
<tr>
    <th>Email</th>
    <td><input type="email" required class="form-control" name="email" id=""></td>
</tr>

 <tr>
    <th>Designation </th>
    <td><select name="desig" id="" class="form-control">
        <option value="Manager">Manager</option>
        <option value="Billing">Billing</option>
        <option value="Accountant">Accountant</option>
        <option value="Field Work">Field Work</option>
    </select></td>
</tr>
<tr>
    <th>username</th>
    <td><input type="text" required class="form-control" name="uname" id=""></td>
</tr>
  <tr>
    <th>Password</th>
    <td><input type="text" required class="form-control" name="pss" id=""></td>
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

<h3>View Staffs</h3>
<table style="width: 1000px;">
    <tr>
        <th>Name</th>
        <th>Place</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Designation</th>
    </tr>
    <?php 
    $q="select * from staff";
    $res=select($q);

    $i=1;
    foreach($res as $row){
    ?>
    <tr>
        <td><?php echo $row['firstname'].$row['lastname'] ?></td>
        <td><?php echo $row['place'] ?></td>
        <td><?php echo $row['phone'] ?></td>
        <td><?php echo $row['email'] ?></td>
        <td><?php echo $row['designation'] ?></td>
        <td><a class="btn btn-success" href="?uid=<?php echo $row['staff_id'] ?>">update</a></td>
        <td><a class="btn btn-danger" href="?did=<?php echo $row['staff_id'] ?>">delete</a></td>
    </tr>
    <?php }?>
</table>
</center>
<?php include 'footer.php'?>

