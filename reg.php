<!-- <?php include 'publicheader.php';

if(isset($_POST['sub'])){
	extract($_POST);
	$q="INSERT INTO `login` VALUES(null,'$uname','$pss','customer')";
	$ids=insert($q);
	$qry="INSERT INTO `customer` VALUES(null,'$ids','$fname','$lname','$place','$phone','$email','$gender')";
	insert($qry);
    alert('registration successful');
    return redirect("login.php");
}
?> 
 -->





<style>
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



  <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="img/carousel-bg-1.jpg" alt="Image">
                    <div class="carousel-caption d-flex align-items-center">
                        <div class="container">
<center>
    <br>
<form  method="post">

<h2 style="font-size: 30px;margin-right:  300px" class="text-white" id="hstyle" > Registration</h2>
<table class="table " style="width: 700px;color: white"  >
<tr>
    <th> </th>


    <td class="form-floating" 

    ><input type="text" required class="form-control" id="fname" placeholder="First Name" name="fname" id="">
            <label for="fname">First Name</label>
    </td>
</tr>
<tr>
    <th></th>
    <td  class="form-floating"><input type="text" required id="lname"  class="form-control" placeholder="Last Name " name="lname" id="">
      <label for="lname">Last Name</label></td>
</tr>
<tr>
    <th> </th>
    <td class="form-floating"><input type="text" required id="place"  class="form-control"placeholder="Place" name="place" id="">
      <label for="place">Place</label></td>
</tr>
<tr>
    <th> </th>
    <td class="form-floating"><input type="number" required id="phone"  class="form-control" placeholder="Phone" name="phone" id="">
      <label for="phone"> Phone</label></td>
</tr>
<tr>
    <th></th>
    <td class="form-floating"><input type="email" required id="email"  class="form-control" placeholder="Email" name="email" id="">
      <label for="email"> Email</label></td>
</tr>

 <tr>
    <th></th>
    <th>Gender </th>
    <td style="position: relative;right: 230px" class="form-floating"><input  type="radio" class="form-check-input" name="gender" class="btn btn-success" value="male" id="">Male<input type="radio" class="form-check-input" class="btn btn-success" name="gender" value="female" id="">female </td>
</tr>




  <tr>
    <th></th>
    <td class="form-floating"><input type="text" required class="form-control" id="uname"  placeholder="username" name="uname" id="">
      <label for="uname"> username</label></td>
</tr>
  <tr>
    <th></th>
    <td class="form-floating"><input type="text" required class="form-control" id="pss"  placeholder="Password" name="pss" id="">
      <label for="pss">Password</label></td>
</tr>
<tr>
    <td colspan="2" align="center">
        <input type="submit" class="btn btn-success"  name="sub" id="">
    </td>
</tr>
</table>
</form>
</center>
 <div class="col-lg-5 d-none d-lg-flex animated zoomIn">
                                    <img class="img-fluid" src="img/carousel-1.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


<?php include 'footer.php'?>