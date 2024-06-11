<?php include 'publicheader.php';

if(isset($_POST['btn'])){

    extract($_POST);
    
    
    $q="select * from login where username='$uname' and password='$pasw'";
    $res=select($q);
    if (sizeof($res) > 0){
        $_SESSION['lid']  = $res[0]['login_id'];
        $lid=$_SESSION['lid'];
    if ($res[0]['usertype'] == 'admin'){
        alert("login Successfully");
        return redirect("adminhome.php");

        
    } else if($res[0]['usertype'] == 'staff'){
        $q="select * from staff where login_id='$lid'";
        $val = select($q);
        if (sizeof($val) > 0){
            $_SESSION['sid']=$val[0]['staff_id'];
            $sid=$_SESSION['sid'];
            alert("login Successfully");
            return redirect("staffhome.php");
        }
    }
    else if($res[0]['usertype'] == 'customer'){
        $q="select * from customer where login_id='$lid'";
        $val = select($q);
        if (sizeof($val) > 0){
            $_SESSION['cid']=$val[0]['customer_id'];
            $cid=$_SESSION['cid'];
            alert("login Successfully");
            return redirect("customerhome.php");
        }
    }

    
}else{
  alert('invalid username and password');
}
}
?> 

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
                           
     <center>                          <form  method="post" >
    <h1 class="display-3 text-white mb-4 pb-3 animated slideInDown">Login</h1>
    <table class="table" style="width: 500px" >
      
      
      <tr >
        <td class="form-floating mb-3" >

          <input type="text" class="form-control" id="uname" required name="uname" placeholder="username" >
          <label  for="uname">Username</label>
        </td>
      </tr>
       

     <tr>
       
        <td  class="form-floating ">
        <input type="password" class="form-control" required name="pasw" placeholder="Password" id="passw">
        <label  for="passw">Password</label>
      </td>
      </tr>
           
        <tr>
            <td colspan="2" align="center"><input type="submit" class="btn btn-secondary" name="btn" id=""></td>
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