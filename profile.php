<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{
if(isset($_POST['updateprofile']))
  {
$name=$_POST['fullname'];
$mobileno=$_POST['mobilenumber'];
$dob=$_POST['dob'];
$adress=$_POST['address'];
$city=$_POST['city'];
$country=$_POST['country'];
$email=$_SESSION['login'];
$sql="update tblusers set FullName=:name,ContactNo=:mobileno,dob=:dob,Address=:adress,City=:city,Country=:country where EmailId=:email";
$query = $dbh->prepare($sql);
$query->bindParam(':name',$name,PDO::PARAM_STR);
$query->bindParam(':mobileno',$mobileno,PDO::PARAM_STR);
$query->bindParam(':dob',$dob,PDO::PARAM_STR);
$query->bindParam(':adress',$adress,PDO::PARAM_STR);
$query->bindParam(':city',$city,PDO::PARAM_STR);
$query->bindParam(':country',$country,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->execute();
$msg="Profile Updated Successfully";
}

?>
  <!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="keywords" content="">
<meta name="description" content="">
<title>Bicycle Rental | Profile</title>
<!--Bootstrap -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
<!--Custome Style -->
<link rel="stylesheet" href="assets/css/style.css" type="text/css">
<!--OWL Carousel slider-->
<link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
<link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
<!--slick-slider -->
<link href="assets/css/slick.css" rel="stylesheet">
<!--bootstrap-slider -->
<link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
<!--FontAwesome Font Style -->
<link href="assets/css/font-awesome.min.css" rel="stylesheet">


<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/favicon-icon/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/favicon-icon/apple-touch-icon-114-precomposed.html">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/favicon-icon/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="assets/images/favicon-icon/apple-touch-icon-57-precomposed.png">
<link rel="shortcut icon" href="assets/images/favicon-icon/favicon.png">
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet"> 
 <style>
    .errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
    </style>
</head>
<body>



<!--Header-->
<?php include('includes/header.php');?>
<!-- /Header --> 
<!--Page Header-->
<section class="page-header profile_page">
  <div class="container">
    <div class="page-header_wrap">
      <div class="page-heading">
        <h1>Your Profile</h1>
      </div>
      <ul class="coustom-breadcrumb">
        <li><a href="index.php">Home</a></li>
        <li>Profile</li>
      </ul>
    </div>
  </div>
  <!-- Dark Overlay-->
  <div class="dark-overlay"></div>
</section>
<!-- /Page Header--> 


<?php 
$useremail=$_SESSION['login'];
$sql = "SELECT * from tblusers where EmailId=:useremail";
$query = $dbh -> prepare($sql);
$query -> bindParam(':useremail',$useremail, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{ ?>
<section class="user_profile inner_pages">
  <div class="container">
    <div class="user_profile_info gray-bg padding_4x4_40">
      <div class="upload_user_logo"> <img src="data:image/png;base64,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" alt="image">
      </div>

      <div class="dealer_info">
        <h5><?php echo htmlentities($result->FullName);?></h5>
        <p><?php echo htmlentities($result->Address);?><br>
          <?php echo htmlentities($result->City);?>,&nbsp;<?php echo htmlentities($result->Country);?></p>
      </div>
    </div>
  
    <div class="row">
      <div class="col-md-3 col-sm-3">
        <?php include('includes/sidebar.php');?>
      <div class="col-md-6 col-sm-8">
        <div class="profile_wrap">
          <h5 class="uppercase underline">General Settings</h5>
          <?php  
         if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
          <form  method="post">
           <div class="form-group">
              <label class="control-label">Registered Date -</label>
             <?php echo htmlentities($result->RegDate);?>
            </div>
             <?php if($result->UpdationDate!=""){?>
            <div class="form-group">
              <label class="control-label">Last Update  -</label>
             <?php echo htmlentities($result->UpdationDate);?>
            </div>
            <?php } ?>
            <div class="form-group">
              <label class="control-label">Full Name</label>
              <input class="form-control white_bg" name="fullname" value="<?php echo htmlentities($result->FullName);?>" id="fullname" type="text"  required>
            </div>
            <div class="form-group">
              <label class="control-label">Email Address</label>
              <input class="form-control white_bg" value="<?php echo htmlentities($result->EmailId);?>" name="emailid" id="email" type="email" required readonly>
            </div>
            <div class="form-group">
              <label class="control-label">Phone Number</label>
              <input class="form-control white_bg" name="mobilenumber" value="<?php echo htmlentities($result->ContactNo);?>" id="phone-number" type="text" required>
            </div>
            <div class="form-group">
              <label class="control-label">Date of Birth&nbsp;(dd/mm/yyyy)</label>
              <input class="form-control white_bg" value="<?php echo htmlentities($result->dob);?>" name="dob" placeholder="dd/mm/yyyy" id="birth-date" type="text" >
            </div>
            <div class="form-group">
              <label class="control-label">Complete Address</label>
              <textarea class="form-control white_bg" name="address" rows="4" ><?php echo htmlentities($result->Address);?></textarea>
            </div>
            <div class="form-group">
              <label class="control-label">Country</label>
              <input class="form-control white_bg"  id="country" name="country" value="<?php echo htmlentities($result->Country);?>" type="text">
            </div>
            <div class="form-group">
              <label class="control-label">City</label>
              <input class="form-control white_bg" id="city" name="city" value="<?php echo htmlentities($result->City);?>" type="text">
            </div>
            <?php }} ?>
           
            <div class="form-group">
              <button type="submit" name="updateprofile" class="btn">Save Changes <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<!--/Profile-setting--> 

<<!--Footer -->
<?php include('includes/footer.php');?>
<!-- /Footer--> 

<!--Back to top-->
<div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>
<!--/Back to top--> 

<!--Login-Form -->
<?php include('includes/login.php');?>
<!--/Login-Form --> 

<!--Register-Form -->
<?php include('includes/registration.php');?>

<!--/Register-Form --> 

<!--Forgot-password-Form -->
<?php include('includes/forgotpassword.php');?>
<!--/Forgot-password-Form --> 

<!-- Scripts --> 
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script> 
<script src="assets/js/interface.js"></script> 

<!--bootstrap-slider-JS--> 
<script src="assets/js/bootstrap-slider.min.js"></script> 
<!--Slider-JS--> 
<script src="assets/js/slick.min.js"></script> 
<script src="assets/js/owl.carousel.min.js"></script>

</body>
</html>
<?php } ?>